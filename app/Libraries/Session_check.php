<?php

namespace App\Libraries;

class Session_check
{

    //render with predefined contents
    public function is_login_user($url = null){
        $session = session();
        helper('url');
        if(!$session->has('login_user')){
            return redirect()->to(base_url());
        }else{
            return true;
        }
    }
}
