<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rt extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rt' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_rw' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
            'alamat' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'no_wa' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
                'null' => true
            ],
            'nama_rt' => [
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
        $this->forge->addKey('id_rt', true);
        $this->forge->addForeignKey('id_rw', 'rw', 'id_rw', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rt');
    }

    public function down()
    {
        $this->forge->dropTable('rt');
    }
}
