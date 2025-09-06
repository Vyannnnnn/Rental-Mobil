<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        // Buat tabel transaksi jika sudah ada langsung keluar
        if ($db->tableExists('transaksi')) {
            return; // sudah ada
        }

        $this->forge->addField([
            'id' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true, // jika user dihapus biarkan transaksi tetap ada
            ],
            'armada_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_telp' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'duration' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pickup_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'return_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status_penyewaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 30, // contoh: 'Dengan Driver', 'Tanpa Driver'
                'null'       => true,
            ],
            'status_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 20, // Diproses, Disewa, Selesai, Dibatalkan
                'default'    => 'Diproses',
            ],
            'biaya_sewa' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'ktp' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'kk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'bukti_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'cancelled_reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'cancelled_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('armada_id');
        $this->forge->addKey('status_transaksi');

        // Foreign key dihilangkan untuk mencegah error (errno 150) jika tabel referensi beda engine / struktur.
        // Jika ingin ditambah setelah semua tabel siap dan engine kompatibel, bisa pakai ALTER TABLE manual.

        $this->forge->createTable('transaksi', true);
    }

    public function down()
    {
        $db = \Config\Database::connect();
        if ($db->tableExists('transaksi')) {
            $this->forge->dropTable('transaksi', true);
        }
    }
}
