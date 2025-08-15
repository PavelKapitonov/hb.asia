<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandsTextModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'brands_text';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "lang",
        "title",
        "text",
        "brand-id",
    ];

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
    public function getOne($id)
    {
        return $this->where(['id' => $id])->first();
    }    
    public function getText($id)
    {
        return $this->where(['brand-id' => $id])->findAll();
    }
    public function getTextLang($id, $lang)
    {
        return $this->where(['lang' => $lang])->where(['brand-id' => $id])->first();
    }
}
