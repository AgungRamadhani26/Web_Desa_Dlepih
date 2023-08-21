<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Konten extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konten' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'caption_gambar' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'created_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'updated_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ]
        ]);
        $this->forge->addKey('id_konten', true);
        $this->forge->createTable('konten');
    }

    public function down()
    {
        $this->forge->dropTable('konten');
    }
}
