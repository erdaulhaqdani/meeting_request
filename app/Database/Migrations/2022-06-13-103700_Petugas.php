<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
{
    public function up()
    {
        $fields =
            [
                'idPetugas' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'NIP' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
                'Nama' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'Email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'kantor' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'idLevel' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],
                'Unit' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],
                'Password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'created_at' => [
                    'type'       => 'DATETIME'
                ],
                'updated_at' => [
                    'type'       => 'DATETIME'
                ]
            ];

        $this->forge->addField($fields);
        $this->forge->addKey('idPetugas', true);
        $this->forge->addForeignKey('idLevel', 'level_user', 'idLevel', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('Unit', 'kategori', 'idKategori', 'CASCADE', 'CASCADE');

        // $this->db->enableForeignKeyChecks();
        $this->forge->createTable('Petugas', true);
    }

    public function down()
    {
        $this->forge->dropTable('Petugas');
    }
}
