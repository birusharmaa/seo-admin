<?php

namespace App\Controllers;

class Purchase extends Security_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return $this->template->rander('Purchase/index');
    }
    public function add_suppliers()
    {
        return $this->template->rander('Purchase/add_suppliers');
    }
}
