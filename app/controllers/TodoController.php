<?php

class TodoController extends Controller
{
    public function index()
    {
        $userId = $this->currentUserId();

        $todoModel = new Todo();
        $todos = $todoModel->allByUser($userId);

        $this->view('todo/index', compact('todos'));
    }

    public function createForm()
    {
        $this->view('todo/create');
    }

    public function store()
    {
        $userId = $this->currentUserId();

        $title = trim($_POST['title'] ?? '');
        $desc  = trim($_POST['description'] ?? '');
        $imagePath = null;

        if (!$title) {
            Session::flash('error', 'Title is required.');
            return $this->redirect('/todos/create');
        }

        try {
            $imagePath = Uploader::uploadImage($_FILES['image'] ?? [], UPLOAD_TODO_DIR);
        } catch (RuntimeException $e) {
            Session::flash('error', $e->getMessage());
            return $this->redirect('/todos/create');
        }

        $todoModel = new Todo();
        $todoModel->create($userId, $title, $desc, $imagePath);

        Session::flash('success', 'Todo created successfully.');
        return $this->redirect('/todos');
    }

    public function editForm()
    {
        $userId = $this->currentUserId();
        $id = (int) ($_GET['id'] ?? 0);
        $todoModel = new Todo();

        $todo = Authorization::ensureOwner($todoModel->findById($id), $userId, 'todo', '/todos');

        $this->view('todo/edit', compact('todo'));
    }

    public function update()
    {
        $userId = $this->currentUserId();
        $id = (int) ($_POST['id'] ?? 0);

        $title = trim($_POST['title'] ?? '');
        $desc  = trim($_POST['description'] ?? '');

        if (!$title) {
            Session::flash('error', 'Title is required.');
            return $this->redirect('/todos/edit?id=' . $id);
        }

        $todoModel = new Todo();
        $todo = Authorization::ensureOwner($todoModel->findById($id), $userId, 'todo', '/todos');

        $imagePath = $todo['image_path'] ?? null;
        $removeImage = isset($_POST['remove_image']) && $_POST['remove_image'] === '1';

        if ($removeImage) {
            Uploader::delete($imagePath);
            $imagePath = null;
        }

        try {
            $newImagePath = Uploader::uploadImage($_FILES['image'] ?? [], UPLOAD_TODO_DIR);
            if ($newImagePath) {
                Uploader::delete($imagePath);
                $imagePath = $newImagePath;
            }
        } catch (RuntimeException $e) {
            Session::flash('error', $e->getMessage());
            return $this->redirect('/todos/edit?id=' . $id);
        }

        $todoModel->update($id, $userId, $title, $desc, $imagePath);

        Session::flash('success', 'Todo updated successfully.');
        return $this->redirect('/todos');
    }

    public function destroy()
    {
        $userId = $this->currentUserId();
        $id = (int) ($_POST['id'] ?? 0);
        $todoModel = new Todo();

        $todo = Authorization::ensureOwner($todoModel->findById($id), $userId, 'todo', '/todos');
        Uploader::delete($todo['image_path'] ?? null);
        $todoModel->delete($id, $userId);

        Session::flash('success', 'Todo deleted.');
        return $this->redirect('/todos');
    }
}
