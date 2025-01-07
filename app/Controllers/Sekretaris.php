<?php

namespace App\Controllers;

class Sekretaris extends BaseController
{
    public function loginsekretaris(): string
    {
        return view('loginsekretaris');
    }
    
    public function dashboardsekretaris(): string
    {
        return view('dashboardadmin/index.html');
    }
    
}