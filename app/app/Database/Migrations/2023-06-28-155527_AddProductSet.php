<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProductSet extends Migration
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
                    'title'         => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
                    ], 
                    'diameter'         => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '510',
                    ],                         
                    'note'         => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
                    ], 
                    'frequency'         => [
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
            $this->forge->createTable('product_set');
    }

    public function down()
    {
            $this->forge->dropTable('product_set');
    }
}
