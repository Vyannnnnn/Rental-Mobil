<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class AddFullnameToUsers extends Migration
{
    public function up()
    {
        $db = Database::connect();

        // Jika tabel users belum ada (database hilang total), buat lengkap dengan kolom fullname
        if (!$db->tableExists('users')) {
            $this->forge->addField([
                'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'email'            => ['type' => 'VARCHAR', 'constraint' => 255],
                'fullname'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'username'         => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
                'password_hash'    => ['type' => 'VARCHAR', 'constraint' => 255],
                'reset_hash'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'reset_at'         => ['type' => 'DATETIME', 'null' => true],
                'reset_expires'    => ['type' => 'DATETIME', 'null' => true],
                'activate_hash'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'status'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'status_message'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'active'           => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'force_pass_reset' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at'       => ['type' => 'DATETIME', 'null' => true],
                'updated_at'       => ['type' => 'DATETIME', 'null' => true],
                'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('email');
            $this->forge->addUniqueKey('username');
            $this->forge->createTable('users', true);
            return; // selesai karena tabel baru sudah mencakup fullname
        }

        // Jika tabel users sudah ada (hasil migrate vendor) tapi kolom fullname hilang, tambahkan.
        if (!$db->fieldExists('fullname', 'users')) {
            $this->forge->addColumn('users', [
                'fullname' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'email'
                ]
            ]);
        }
    }

    public function down()
    {
        $db = Database::connect();
        if ($db->tableExists('users') && $db->fieldExists('fullname', 'users')) {
            $this->forge->dropColumn('users', 'fullname');
        }
    }
}
