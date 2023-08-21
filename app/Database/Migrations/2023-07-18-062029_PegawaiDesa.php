<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PegawaiDesa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai_desa' => [
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
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->addKey('id_pegawai_desa', true);
        $this->forge->createTable('pegawai_desa');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai_desa');
    }
}
