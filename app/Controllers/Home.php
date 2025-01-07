<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('bem.php');
    }
    
    public function login(): string
    {
        return view('login');
        
    }
    

    public function login1(): string
    {
        return view('login1');
        
    }    

    public function notifikasi(): string
    {
        return view('notifikasi');
    }
    
    public function dashboard(): string
    {
        return view('dashboard');
    }
    
    public function jadwal(): string
    {
        return view('jadwal');
    }

    public function view_jadwal(): string
    {
        return view('view_jadwal');
    }
    public function login_admin(): string
    {
        return view('login_admin');
    }

    public function dbadmin(): string
    {
        return view('index.html');
    }

    public function stock(): string
    {
        return view('stock/index.php');
    }
}



