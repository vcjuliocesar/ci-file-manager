<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DocumentsSharing extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_document_sharing' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => true
            ],
            'id_file' => [
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
        $this->forge->addKey('id_document_sharing', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_file', 'files', 'id_file', 'CASCADE', 'CASCADE');
        $this->forge->createTable('documents_sharing');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('documents_sharing');
    }
}
