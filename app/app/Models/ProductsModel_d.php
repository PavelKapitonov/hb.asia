<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel_d extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products_d';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id' ,
        'slug' ,
        'show_title',
        'category-id',
        'brand_id',
        'price',
        'sale',
        'art' ,
        'diameter',
        'note' ,
        'frequency' ,
        'availability',
        'img',
        'video',
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

    public function getProducts($category = false, $brand = false, $locale = false)
    {
        if ($brand === false) {
            return $this->where(['lang' => $locale])->where('category_id', $category)->findAll();
        }
        return $this->where(['lang' => $locale])->where('category_id', $category)->where('brand_id', $brand)->findAll();
    } 
    public function getProduct($slug = false, $locale = false)
    {
        return $this->where(['slug' => $slug])->first();
    }   
    public function getProductById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
