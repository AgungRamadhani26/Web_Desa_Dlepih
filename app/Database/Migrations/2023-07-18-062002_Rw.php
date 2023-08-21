<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rw extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rw' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_dan_gelar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true
            ],
            'no_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true
            ],
            'dusun' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'no_wa' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
                'null' => true
            ],
            'nama_rw' => [
                'type' => 'INT',
                'constraint' => 2,
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
        $this->forge->addKey('id_rw', true);
        $this->forge->createTable('rw');
    }

    public function down()
    {
        $this->forge->dropTable('rw');
    }
}
