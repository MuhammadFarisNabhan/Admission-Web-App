<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admitted extends Migration
{
    public function up()
    {
        // // Field Admitted
        $this->forge->addField([
            'id_admitted' => [
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
            'id_applicant' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'hasil_ujian' => [
                'type' => 'TEXT',
                'constraint' => '60',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_admitted', true);
        $this->forge->addForeignKey('id_prospect', 'prospect', 'id');
        $this->forge->addForeignKey('id_applicant', 'applicant', 'id_applicant');
        $this->forge->createTable('admitted');
    }

    public function down()
    {
        $this->forge->dropForeignKey('admitted', 'admitted_id_prospect_foreign');
        $this->forge->dropForeignKey('admitted', 'admitted_id_applicant_foreign');
        $this->forge->dropTable('admitted');
    }
}
