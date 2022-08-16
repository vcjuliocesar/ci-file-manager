<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => false,
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
