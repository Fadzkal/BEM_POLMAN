<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginadmin() // Ubah nama metode menjadi loginadmin
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $user = $model->where('username', $this->request->getPost('username'))
                          ->where('password', $this->request->getPost('password'))
                          ->first();
            if ($user) {
                session()->set('log', 'True');
                return redirect()->to('/stocks');
            } else {
                return redirect()->to('/loginadmin')->with('error', 'Invalid credentials');
            }
        }
        return view('loginadmin'); // Ubah nama view menjadi loginadmin
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/loginadmin'); // Ubah rute logout
    }
}