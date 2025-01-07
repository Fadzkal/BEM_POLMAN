<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function profile($userId): string
    {
        return view('admin/profile', ['user' => $userId]);
    }

    public function updatePassword($userId)
    {
        // Code to update the password
    }

    public function updateProfile($userId)
    {
        // Code to update the profile
    }
}
