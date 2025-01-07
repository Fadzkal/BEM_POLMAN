<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminLoginController extends BaseController
{
    public function index(): string
    {
        return view('admin/login/index');  // This should point to the 'Views/admin/login/index.php' view
    }

    public function authenticate()
    {
        // Logic for authenticating the user (optional)
    }
}
