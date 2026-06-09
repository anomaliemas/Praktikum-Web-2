<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set(['logged_in' => true, 'username' => $user['username']]);
            return redirect()->to('/buku');
        }
        
        session()->setFlashdata('error', 'Username atau Password salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}