<?php

namespace App\Controllers;

class HR extends Security_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->template->rander('HR/index');
    }
    public function add_Employee()
    {
        return $this->template->rander('HR/add_Employee');
    }
    public function departments()
    {
        return $this->template->rander('HR/departments');
    }
    public function designations()
    {
        return $this->template->rander('HR/designations');
    }
    public function apply_leaves()
    {
        return $this->template->rander('HR/apply_leaves');
    }
    public function approve_reject_leaves()
    {
        return $this->template->rander('HR/approve_reject_leaves');
    }
    public function leave_wallet()
    {
        return $this->template->rander('HR/leave_wallet');
    }
    public function promotion_demotion()
    {
        return $this->template->rander('HR/promotion_demotion');
    }
    public function employee_details()
    {
        return view('HR/employee_details');
    }
    public function edit_employee_details()
    {
        return view('HR/edit_employee_details');
    }
    public function payroll()
    {
        return view('HR/payroll');
    }
    public function generate_salary_slip()
    {
        return view('HR/generate_salary_slip');
    }
    public function salary_slip()
    {
        return view('HR/salary_slip');
    }
    public function hierarchy()
    {
        return view('HR/hierarchy');
    }
}
