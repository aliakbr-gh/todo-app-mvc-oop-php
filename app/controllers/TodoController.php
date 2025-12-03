<?php

class TodoController extends Controller
{
    private function requireAuth()
    {
        if (!Session::get('user_id')) {
            Session::flash('error', 'Please login first.');
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->requireAuth();
        $userId = (int) Session::get('user_id');

        $todoModel = new Todo();
        $todos = $todoModel->allByUser($userId);

        $this->view('todo/index', compact('todos'));
    }

    public function createForm()
    {
        $this->requireAuth();
        $this->view('todo/create');
    }

    public function store()
    {
        $this->requireAuth();
        $userId = (int) Session::get('user_id');

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
        $this->requireAuth();
        $userId = (int) Session::get('user_id');
        $id = (int) ($_GET['id'] ?? 0);

        $todoModel = new Todo();
        $todo = $todoModel->find($id, $userId);

        if (!$todo) {
            Session::flash('error', 'Todo not found.');
            return $this->redirect('/todos');
        }

        $this->view('todo/edit', compact('todo'));
    }

    public function update()
    {
        $this->requireAuth();
        $userId = (int) Session::get('user_id');
        $id = (int) ($_POST['id'] ?? 0);

        $title = trim($_POST['title'] ?? '');
        $desc  = trim($_POST['description'] ?? '');

        if (!$title) {
            Session::flash('error', 'Title is required.');
            return $this->redirect('/todos/edit?id=' . $id);
        }

        $todoModel = new Todo();
        $todoModel->update($id, $userId, $title, $desc);

        Session::flash('success', 'Todo updated successfully.');
        return $this->redirect('/todos');
    }

    public function destroy()
    {
        $this->requireAuth();
        $userId = (int) Session::get('user_id');
        $id = (int) ($_POST['id'] ?? 0);

        $todoModel = new Todo();
        $todoModel->delete($id, $userId);

        Session::flash('success', 'Todo deleted.');
        return $this->redirect('/todos');
    }
}