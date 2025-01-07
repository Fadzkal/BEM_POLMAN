<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }
}
