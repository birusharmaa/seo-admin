<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Plugin_model;
use App\Models\General_model;


class Partners extends BaseController
{
    function __construct()
    {
        helper("general");
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $validation =  \Config\Services::validation();
        $this->validation = $validation; 
        $this->request = $request;
        $this->session = $session;
        $model = new Plugin_model();
        $this->model = $model; 
        
         
    }

    public function index()
    {
        if($this->session->has('login_user')){
            $user_data = $this->session->get('login_user');
        }
        $return['data'] = $this->model->getAll_plugin($user_data['user_id']);
        $return['color'] =  getThemeColor($user_data["user_id"]);        
        $return['title'] = 'All Plugins';  
        $return['page_title'] = '';  
        return view('clients/index',$return);
    }
}
