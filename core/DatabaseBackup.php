<?php

class DatabaseBackup
{
    public static function create(): array
    {
        $db = Database::getInstance();
        $fileName = 'backup_' . DB_NAME . '_' . date('Ymd_His') . '.sql';
        $dir = BASE_PATH . '/storage/backups';
        $path = $dir . '/' . $fileName;

        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }

        $content = [];
        $content[] = '-- Database backup';
        $content[] = '-- Database: ' . DB_NAME;
        $content[] = '-- Generated at: ' . date('Y-m-d H:i:s');
        $content[] = 'SET FOREIGN_KEY_CHECKS=0;';
        $content[] = '';

        $tables = $db->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

        foreach ($tables as $table) {
            $tableName = (string) $table;

            $create = $db->query('SHOW CREATE TABLE `' . $tableName . '`')->fetch(PDO::FETCH_ASSOC);
            $createSql = $create['Create Table'] ?? '';

            $content[] = 'DROP TABLE IF EXISTS `' . $tableName . '`;';
            $content[] = $createSql . ';';
            $content[] = '';

            $rows = $db->query('SELECT * FROM `' . $tableName . '`')->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                $columns = array_map(static fn ($col) => '`' . $col . '`', array_keys($rows[0]));
                $columnList = implode(', ', $columns);

                foreach ($rows as $row) {
                    $values = [];
                    foreach ($row as $value) {
                        if ($value === null) {
                            $values[] = 'NULL';
                        } else {
                            $values[] = $db->quote((string) $value);
                        }
                    }
                    $content[] = 'INSERT INTO `' . $tableName . '` (' . $columnList . ') VALUES (' . implode(', ', $values) . ');';
                }
                $content[] = '';
            }
        }

        $content[] = 'SET FOREIGN_KEY_CHECKS=1;';
        $content[] = '';

        file_put_contents($path, implode("\n", $content));

        return [
            'path' => $path,
            'file_name' => $fileName,
        ];
    }
}
