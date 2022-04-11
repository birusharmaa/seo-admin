<?php

namespace App\Controllers;

class Customer extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        return $this->template->rander('Customer/index');
    }
    public function add_customers()
    {
        return $this->template->rander('Customer/add_customers');

    }
    public function customer_details()
    {
        return view('Customer/customer_details');
    }
    public function edit_customer_details()
    {
        return view('Customer/edit_customer_details');
    }
}
