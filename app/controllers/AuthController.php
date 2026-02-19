<?php

class AuthController extends Controller
{
    public function showLogin()
    {
        $this->requireGuest();
        $this->view('auth/login');
    }

    public function showRegister()
    {
        $this->requireGuest();
        $this->view('auth/register');
    }

    public function register()
    {
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');
        $role  = 'admin';

        if (!$name || !$email || !$pass) {
            Session::flash('error', 'All fields are required.');
            return $this->redirect('/register');
        }

        $userModel = new User();
        if ($userModel->findByEmail($email)) {
            Session::flash('error', 'Email already registered.');
            return $this->redirect('/register');
        }

        if ($userModel->create($name, $email, $pass, $role)) {
            Session::flash('success', 'Registration successful. Please login.');
            return $this->redirect('/login');
        }

        Session::flash('error', 'Something went wrong.');
        return $this->redirect('/register');
    }

    public function login()
    {
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');

        if (!$email || !$pass) {
            Session::flash('error', 'Email and password are required.');
            return $this->redirect('/login');
        }

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($pass, $user['password'])) {
            Session::flash('error', 'Invalid credentials.');
            return $this->redirect('/login');
        }

        Auth::login($user);
        Session::flash('success', 'Logged in successfully.');
        return $this->redirect('/todos');
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('/login');
    }
}
