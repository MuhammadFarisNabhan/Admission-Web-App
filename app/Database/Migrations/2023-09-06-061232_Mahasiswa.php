<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        // Field Prospect
        $this->forge->addField([
            // 'no' => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'null'           => false,
            // ],
            'id' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            // 'id' => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'auto_increment' => true,
            // ],
            'nama' => [
                'type'       => 'TEXT',
                'constraint' => '255',
                'null' => false,
            ],
            'asal_sekolah' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '24',
                'null' => false,
            ],
            'status_pembayaran' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
            'program' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
            'program_studi' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
            'email' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint'    => '60',
                'null' => true,
            ],
            'status' => [
                'type' => 'INT',
                'constraint'    => 11,
                'null' => false,
            ]
        ]);

        // create foreignkey
        $this->forge->addKey('id', true);
        $this->forge->createTable('prospect');
    }

    public function down()
    {
        $this->forge->dropTable('prospect');
    }
}
