<?php

class Authorization
{
    public static function ensureOwner(?array $record, int $userId, string $entityLabel = 'record', string $redirectPath = '/todos'): array
    {
        if (!$record) {
            Session::flash('error', ucfirst($entityLabel) . ' not found.');
            header("Location: " . BASE_URL . $redirectPath);
            exit;
        }

        if ((int) ($record['user_id'] ?? 0) !== $userId) {
            Session::flash('error', 'You are not authorized to access this ' . $entityLabel . '.');
            header("Location: " . BASE_URL . $redirectPath);
            exit;
        }

        return $record;
    }
}
