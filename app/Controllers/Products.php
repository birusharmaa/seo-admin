<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        return view('Products/index');
    }
    public function add_product()
    {
        return view('Products/add_product');
    }
    public function all_categories()
    {
        return view('Products/all_categories');
    }
    public function add_category()
    {
        return view('Products/add_category');
    }
    public function add_documents()
    {
        return view('Products/add_documents');
    }
    public function add_warranty()
    {
        return view('Products/add_warranty');
    }
    public function selling_price_group()
    {
        return view('Products/selling_price_group');
    }
  
}
