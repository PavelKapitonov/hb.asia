<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductText extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 11,
                                'unique'       => true,
                                'auto_increment' => true,
                        ], 
                        'lang'         => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ], 
                        'title'         => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '510',
                        ],                         
                        'text'         => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],                         
                        'product-id'       => [
                                'type'           => 'INT',
                                'constraint'     => '11',
                        ],                        
                ]);
                $this->forge->addPrimaryKey('id');
                $this->forge->addForeignKey('product-id', 'products', 'id', 'CASCADE', 'RESTRICT');
                $this->forge->createTable('product_text');
        }

        public function down()
        {
                $this->forge->dropTable('product_text');
        }
}
