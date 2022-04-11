<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users_model;

class PartnersController extends Security_Controller
{
    
    public function __construct($redirect = true) {
        parent::__construct();
    }
    
    public function plugins(){
        if($this->session->has('login_user')){
            $user_data = $this->session->get('login_user');
        } 
        $model = new Users_model();      
        $data['color'] =  getThemeColor($user_data["user_id"]);   
        $data['title'] = 'Partner Plugins';
        $data['page_title'] = 'Partner Plugins';
        return view('Plugins/index', $data);
    }
    
    public function cms(){
        if($this->session->has('login_user')){
            $user_data = $this->session->get('login_user');
        } 
        $model = new Users_model();      
        $data['color'] =  getThemeColor($user_data["user_id"]);  
        $data['title'] = 'Partner cms';
        $data['page_title'] = 'Partner CMS';
        return view('Plugins/cms', $data);
    }
}
