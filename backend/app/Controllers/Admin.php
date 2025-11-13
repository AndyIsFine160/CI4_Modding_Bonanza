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
    public function acc(): string
    {
        return view('admin/accounts');
    }
    public function req(): string
    {
        return view('admin/requests');
    }
    public function req_t(): string
    {
        return view('admin/req_table');
    }
}
