<?php

namespace App\Controllers;
class Login extends AppController
{
    public function index()
    {
        $session = session();
        if(!$session->has('login_user')){
            return view('login');
        }else{
            return redirect()->to(base_url().'/dashboard');
        }
    }

    public function forget_password()
    {
        return view('forget_password');
    }
}
