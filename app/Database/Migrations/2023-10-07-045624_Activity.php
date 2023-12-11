<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Activity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_activity' => [
                'type'              => 'INT',
                'constraint'         => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_prospect' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'type_activity' => [
                'type'          => 'VARCHAR',
                'constraint'     => '60',
            ],
            'created_message' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'subject'        => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'comments'        => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'status_activity'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'null'          => true,
            ],
        ]);

        $this->forge->addKey('id_activity', true);
        $this->forge->addForeignKey('id_prospect', 'prospect', 'id');
        $this->forge->createTable('activity');
    }

    public function down()
    {
        $this->forge->dropForeignKey('activity', 'activity_id_prospect_foreign');
        $this->forge->dropTable('activity');
    }
}
