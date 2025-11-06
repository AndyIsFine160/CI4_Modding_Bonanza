<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dash(): string
    {
        return view('admin/dashboard');
    }
    public function serv(): string
    {
        return view('admin/services');
    }
}
