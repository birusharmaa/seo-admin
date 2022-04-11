<?php

namespace App\Models;

use CodeIgniter\Model;

class DBAccessModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dbaccesses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function access_db($auth_key = null){
        $db = db_connect('default');
        $sql = "SELECT * FROM `seo_enquiry`";
        $result = $db->query($sql);
        $result = $result->getResult();
        echo "<pre>";
        print_r($result);
        exit;
    }
}
