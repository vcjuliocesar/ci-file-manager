<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiles extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_profile' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
            'biography' => [
                'type'       => 'TEXT',
                'null' => false,
            ],
            'image' => [
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
        $this->forge->addKey('id_profile', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'SET NULL');
        $this->forge->createTable('profiles');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('profiles');
    }
}
