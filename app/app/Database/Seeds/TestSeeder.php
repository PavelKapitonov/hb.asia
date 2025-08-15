<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $settings = array(
            array('id' => '1','title' => 'StoreInMontenegro','value' => 'https://healingbowl.com'),
            array('id' => '2','title' => 'StoreInRussia','value' => 'https://healingbowl.ru'),
            array('id' => '3','title' => 'StoreInNepal','value' => 'https://healingbowl-nepal.com')
        );     
        foreach ($settings as $data) {
            $this->db->table('settings')->insert($data);
        }
        $categories = array(
            array('id' => '1','title' => 'Professional singing bowl','alias' => 'professional-singing-bowl')
        );
        foreach ($categories as $data) {
            $this->db->table('categories')->insert($data);
        }        

    }
}