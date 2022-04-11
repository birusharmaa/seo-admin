<?php
namespace App\Models;

use CodeIgniter\Model;


class Enquiry_model extends Model
{   
    protected $table      = 'seo_enquiry';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email',
    'phone',  
    'source', 
    'message',
    'status', 
    'created_at', 
    'updated_at'];


    function __construct()
    {
        $this->table = 'seo_enquiry';       
    }
   

    function get_allEnquiry(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*'); 
        $builder->orderBy('id','DESC');
        $res =  $builder->get();  
        if ($res) {
            return $res->getResult();
        } else {
            return $this->db->error();
        } 
    }


    function get_TopFiveEnquiry(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*'); 
        $builder->orderBy('id','DESC');
        $builder->limit(5);
        $res =  $builder->get();  
        if ($res) {
            return $res->getResult();
        } else {
            return $this->db->error();
        } 
    }

    function get_totalCount(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('id'); 
        $builder->countAll();
        $res =  $builder->get();       
        if ($res) {
            return count($res->getResult());
        } else {
            return $this->db->error();
        } 
    }


}
