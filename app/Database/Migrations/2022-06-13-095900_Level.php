<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
        $fields =
            [
                'idLevel' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'Level' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
                'Kelompok' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
            ];

        $this->forge->addField($fields);
        $this->forge->addKey('idLevel', true);
        $this->forge->createTable('level_user', true);
    }

    public function down()
    {
        $this->forge->dropTable('level_user');
    }
}
