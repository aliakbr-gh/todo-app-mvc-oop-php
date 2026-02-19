<?php

class BackupController extends Controller
{
    public function downloadDatabase(): void
    {
        try {
            $backup = DatabaseBackup::create();
        } catch (Throwable $e) {
            Session::flash('error', 'Unable to create backup file.');
            $this->redirect('/todos');
        }

        $path = $backup['path'];
        $fileName = $backup['file_name'];

        if (!is_file($path)) {
            Session::flash('error', 'Backup file not found.');
            $this->redirect('/todos');
        }

        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }
}
