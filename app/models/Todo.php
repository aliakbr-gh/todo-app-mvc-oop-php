<?php

class Todo
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function allByUser(int $userId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM todos WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id, int $userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM todos WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM todos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(int $userId, string $title, string $description): bool
    {
        $stmt = $this->db->prepare("INSERT INTO todos (user_id, title, description) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $title, $description]);
    }

    public function update(int $id, int $userId, string $title, string $description): bool
    {
        $stmt = $this->db->prepare("UPDATE todos SET title = ?, description = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$title, $description, $id, $userId]);
    }

    public function delete(int $id, int $userId): bool
    {
        $stmt = $this->db->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $userId]);
    }
}
