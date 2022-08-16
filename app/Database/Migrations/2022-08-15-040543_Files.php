<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Files extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_file' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '45',
                'null' => false,
            ],
            'type_file' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'descriptions' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'path' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_file', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('files');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('files');
    }
}
