<?php

class Uploader
{
    public static function uploadImage(array $file, string $targetDir): ?string
    {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
            throw new RuntimeException('Image upload failed.');
        }

        $maxSize = defined('UPLOAD_MAX_FILE_SIZE') ? (int) UPLOAD_MAX_FILE_SIZE : (2 * 1024 * 1024);
        if (($file['size'] ?? 0) > $maxSize) {
            throw new RuntimeException('Image is too large. Max size is 2MB.');
        }

        $originalName = (string) ($file['name'] ?? '');
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowed = defined('UPLOAD_ALLOWED_EXTENSIONS') ? UPLOAD_ALLOWED_EXTENSIONS : ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extension, $allowed, true)) {
            throw new RuntimeException('Invalid image type.');
        }

        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0777, true);
        }

        $fileName = bin2hex(random_bytes(16)) . '.' . $extension;
        $absolutePath = rtrim($targetDir, '/') . '/' . $fileName;

        if (!move_uploaded_file((string) $file['tmp_name'], $absolutePath)) {
            throw new RuntimeException('Unable to save uploaded image.');
        }

        // Convert absolute path to project-relative web path.
        return str_replace(BASE_PATH, '', $absolutePath);
    }

    public static function delete(?string $relativePath): void
    {
        if (!$relativePath) {
            return;
        }

        $absolutePath = BASE_PATH . $relativePath;
        if (is_file($absolutePath)) {
            @unlink($absolutePath);
        }
    }
}
