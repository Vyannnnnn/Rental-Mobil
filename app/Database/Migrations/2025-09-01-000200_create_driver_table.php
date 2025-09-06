<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDriverTable extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        if ($db->tableExists('driver')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'biaya' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
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
        $this->forge->createTable('driver', true);

        // Seed 1 baris default
        $db->table('driver')->insert([
            'biaya' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $db = \Config\Database::connect();
        if ($db->tableExists('driver')) {
            $this->forge->dropTable('driver', true);
        }
    }
}
