<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function forget_password()
    {
        return view('forget_password');
    }
}
