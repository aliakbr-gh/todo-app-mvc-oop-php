<?php

class TodoController extends Controller
{
    private function authorizeTodoOwner(int $todoId, int $userId): ?array
    {
        $todoModel = new Todo();
        $todo = $todoModel->findById($todoId);

        if (!$todo) {
            Session::flash('error', 'Todo not found.');
            $this->redirect('/todos');
        }

        if ((int) $todo['user_id'] !== $userId) {
            Session::flash('error', 'You are not authorized to access this todo.');
            $this->redirect('/todos');
        }

        return $todo;
    }

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

        if (!$title) {
            Session::flash('error', 'Title is required.');
            return $this->redirect('/todos/create');
        }

        $todoModel = new Todo();
        $todoModel->create($userId, $title, $desc);

        Session::flash('success', 'Todo created successfully.');
        return $this->redirect('/todos');
    }

    public function editForm()
    {
        $userId = $this->currentUserId();
        $id = (int) ($_GET['id'] ?? 0);

        $todo = $this->authorizeTodoOwner($id, $userId);

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

        $this->authorizeTodoOwner($id, $userId);

        $todoModel = new Todo();
        $todoModel->update($id, $userId, $title, $desc);

        Session::flash('success', 'Todo updated successfully.');
        return $this->redirect('/todos');
    }

    public function destroy()
    {
        $userId = $this->currentUserId();
        $id = (int) ($_POST['id'] ?? 0);

        $this->authorizeTodoOwner($id, $userId);

        $todoModel = new Todo();
        $todoModel->delete($id, $userId);

        Session::flash('success', 'Todo deleted.');
        return $this->redirect('/todos');
    }
}
