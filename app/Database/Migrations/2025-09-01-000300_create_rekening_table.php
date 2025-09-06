<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRekeningTable extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        if ($db->tableExists('rekening')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'bank' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'no_rek' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('rekening', true);

        $db->table('rekening')->insert([
            'nama' => 'Nama Pemilik',
            'bank' => 'BANK',
            'no_rek' => '0000000000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $db = \Config\Database::connect();
        if ($db->tableExists('rekening')) {
            $this->forge->dropTable('rekening', true);
        }
    }
}
