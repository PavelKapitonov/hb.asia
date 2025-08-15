<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
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
        'stripe_product_id',
        'stripe_price_id',
        'type',
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

    public function getProducts($category = false, $brand = false, $order, $orderRule, $type = false)
    {
        if($type == true) {
            $t = "";
        }else{
            $t = "";
        }
        if ($brand === '') {
            return $this->where('category-id', $category)->orderBy($order, $orderRule)->findAll();
        }
        return $this->where('type !=', '1')->where('category-id', $category)->where('brand_id', $brand)->orderBy($order, $orderRule)->findAll();
    }
    public function getProductsRandom()
    {
        return $this->where('type !=', '1')->where('category-id !=', '6')->where('category-id !=', '10')->orderBy('price', 'random')->findAll(8);
    }    
    public function getProductsFilter($category = false, $brand = false, $minPrice, $maxPrice, $minDiameter, $maxDiameter, $minFrequency, $maxFrequency, $order, $orderRule )
    {
        if ($brand === '') {
            return $this->where('type !=', '1')->where('category-id', $category)->where('price>=', $minPrice)->where('price<=', $maxPrice)->where('diameter>=', $minDiameter)->where('diameter<=', $maxDiameter)->where('frequency>=', $minFrequency)->where('frequency<=', $maxFrequency)->orderBy($order, $orderRule)->findAll();
        }
        return $this->where('type !=', '1')->where('category-id', $category)->where('brand_id', $brand)->where('price>=', $minPrice)->where('price<=', $maxPrice)->where('diameter>=', $minDiameter)->where('diameter<=', $maxDiameter)->where('frequency>=', $minFrequency)->where('frequency<=', $maxFrequency)->orderBy($order, $orderRule)->findAll();
    }     
    public function getProduct($slug = false, $locale = false)
    {
        return $this->where('type !=', '1')->where(['slug' => $slug])->first();
    }   
    public function getProductById($id)
    {
        return $this->where('type !=', '1')->where(['id' => $id])->first();
    }
}
