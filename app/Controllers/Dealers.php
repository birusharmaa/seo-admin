<?php

namespace App\Controllers;

class Dealers extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        return $this->template->rander('Dealers/index');
    }
    public function approve_dealers()
    {
        return $this->template->rander('Dealers/approve_dealers');
        
    }
    public function add_dealers()
    {
        return $this->template->rander('Dealers/add_dealers');
    }
    public function dealers_details()
    {
        return view('Dealers/dealers_details');
    }
    public function edit_dealers_details()
    {
        return view('Dealers/edit_dealers_details');
    }
    
}
