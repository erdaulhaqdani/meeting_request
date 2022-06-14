<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaduan extends Migration
{
    public function up()
    {
        $fields =
            [
                'idPengaduan' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'Judul' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
                'Isi' => [
                    'type'       => 'TEXT'
                ],
                'idKategori' => [
                    'type'       => 'INT',
                    'constraint' => '11',
                ],
                'Lampiran' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'Status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                ],
                'created_at' => [
                    'type'       => 'DATETIME'
                ],
                'updated_at' => [
                    'type'       => 'DATETIME'
                ],
                // 'Rating' => [
                //     'type'       => 'INT',
                //     'constraint' => '11',
                // ],
                // 'Ulasan' => [
                //     'type'       => 'VARCHAR',
                //     'constraint' => '255',
                // ],
                'idCustomer' => [
                    'type'       => 'INT',
                    'constraint' => '11',
                ],
                'idPetugas' => [
                    'type'       => 'INT',
                    'constraint' => '11',
                ],

            ];

        $this->forge->addField($fields);
        $this->forge->addKey('idPengaduan', true);
        $this->forge->addForeignKey('idCustomer', 'customer', 'idCustomer', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('idPetugas', 'petugas_apt', 'idPetugas', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('pengaduan_online', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
