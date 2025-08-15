<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProducts extends Migration
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
                        'slug' => ['type' => 'varchar', 'constraint' => 255],
                        'show_title' => ['type' => 'BOOLEAN'],
                        'brand_id' => ['type' => 'integer', 'constraint' => 11],
                        'price' => ['type' => 'integer', 'constraint' => 11],
                        'art' => ['type' => 'varchar', 'constraint' => 255],
                        'diameter' => ['type' => 'integer', 'constraint' => 11],
                        'note' => ['type' => 'varchar', 'constraint' => 255],
                        'frequency' => ['type' => 'varchar', 'constraint' => 255],
                        'availability' => ['type' => 'varchar', 'constraint' => 255],
                        'img' => ['type' => 'varchar', 'constraint' => 255],
                        'video' => ['type' => 'varchar', 'constraint' => 255],
                        'category-id' => ['type' => 'integer', 'constraint' => 11],
                ]);
                $this->forge->addPrimaryKey('id');
                $this->forge->addForeignKey('category-id', 'categories', 'id', 'CASCADE', 'RESTRICT');
                $this->forge->createTable('products');
        }

        public function down()
        {
                $this->forge->dropTable('products');
        }
}