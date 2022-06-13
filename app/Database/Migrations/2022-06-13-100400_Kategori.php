<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $fields =
            [
                'idKategori' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'namaKategori' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
            ];

        $this->forge->addField($fields);
        $this->forge->addKey('idKategori', true);
        $this->forge->createTable('kategori', true);
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
