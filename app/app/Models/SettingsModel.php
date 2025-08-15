<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table = 'settings';

    public function getSettings($title = false)
    {
        if ($title === false) {
            return $this->findAll();
        }
        return $this->where(['title' => $title])->first();
    }    
}