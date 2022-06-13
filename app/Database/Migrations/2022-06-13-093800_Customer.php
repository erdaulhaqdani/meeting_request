<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $fields =
            [
                'idCustomer' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'NIK' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '16',
                ],
                'Nama' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'Username' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '20',
                ],
                'tglLahir' => [
                    'type'       => 'DATE',
                ],
                'Email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'noHP' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '20',
                ],
                'jenisKelamin' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '10',
                ],
                'Pekerjaan' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '50',
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
                ],
                'idLevel' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                ],
                'statusAKun' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '50',
                ],

            ];

        $this->forge->addField($fields);
        $this->forge->addKey('idCustomer', true);
        $this->forge->createTable('customer', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
