<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enrollee extends Migration
{
    public function up()
    {
        // // Field Enrollee
        $this->forge->addField([
            'id_enrollee' => [
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
            'id_admitted' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'npm' => [
                'type' => 'TEXT',
                'constraint' => '65',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_enrollee', true);
        $this->forge->addForeignKey('id_prospect', 'prospect', 'id');
        $this->forge->addForeignKey('id_applicant', 'applicant', 'id_applicant');
        $this->forge->addForeignKey('id_admitted', 'admitted', 'id_admitted');
        $this->forge->createTable('enrollee');
    }

    public function down()
    {
        $this->forge->dropForeignKey('enrollee', 'enrollee_id_prospect_foreign');
        $this->forge->dropForeignKey('enrollee', 'enrollee_id_applicant_foreign');
        $this->forge->dropForeignKey('enrollee', 'enrollee_id_admitted_foreign');
        $this->forge->dropTable('enrollee');
    }
}
