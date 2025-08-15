<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductImg extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id' => ['type' => 'integer', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                        'img' => ['type' => 'varchar', 'constraint' => 255],
                        'product-id'       => [
                                'type'           => 'INT',
                                'constraint'     => '11',
                        ], 
                ]);
                $this->forge->addPrimaryKey('id');
                $this->forge->addForeignKey('product-id', 'products', 'id', 'CASCADE', 'RESTRICT');
                $this->forge->createTable('product_img');
        }

        public function down()
        {
                $this->forge->dropTable('product_img');
        }
}
