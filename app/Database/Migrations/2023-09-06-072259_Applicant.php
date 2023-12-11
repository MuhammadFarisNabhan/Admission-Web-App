<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Applicant extends Migration
{
    public function up()
    {
        // Field Applicant
        $this->forge->addField([
            'id_applicant' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // 'id_prospect' => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            // ],
            'id_prospect' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'no_formulir' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tanggal_ujian' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_applicant', true);
        $this->forge->addForeignKey('id_prospect', 'prospect', 'id');
        $this->forge->createTable('applicant');
    }

    public function down()
    {
        $this->forge->dropForeignKey('applicant', 'applicant_id_prospect_foreign');
        $this->forge->dropTable('applicant');
    }
}
