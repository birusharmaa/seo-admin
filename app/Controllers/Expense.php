<?php

namespace App\Controllers;

class Expense extends Security_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        return $this->template->rander('Expense/index');
    }
    public function add_expense()
    {
        return $this->template->rander('Expense/add_expense');
    }

    public function expense_categories()
    {
        return $this->template->rander('Expense/expense_categories');
    }
}
