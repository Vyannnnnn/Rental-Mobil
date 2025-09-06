<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Pastikan tabel transaksi ada
        if (!$db->tableExists('transaksi')) {
            echo "Tabel transaksi belum ada. Jalankan migrasi dulu.\n";
            return;
        }

        // Ambil 1 user & 1 armada untuk relasi (atau skip kalau tidak ada)
        $user = $db->table('users')->get()->getRowArray();
        $armada = $db->table('armada')->get()->getRowArray();

        if (!$user || !$armada) {
            echo "Butuh minimal 1 user dan 1 armada untuk membuat dummy transaksi.\n";
            return;
        }

        $now = time();
        $rows = [];
        $statusTransaksiList = ['Diproses', 'Disewa', 'Selesai', 'Dibatalkan'];
        $statusPenyewaanList = ['Dengan Driver', 'Tanpa Driver'];

        for ($i = 0; $i < 12; $i++) {
            $pickup = $now - rand(1, 15) * 86400; // beberapa hari lalu
            $durJam = rand(12, 120); // antara 12 jam s/d 5 hari
            $return = $pickup + ($durJam * 3600);
            $statusTransaksi = $statusTransaksiList[array_rand($statusTransaksiList)];
            $statusPenyewaan = $statusPenyewaanList[array_rand($statusPenyewaanList)];
            $id = 'INV-' . strtoupper(bin2hex(random_bytes(3)));

            $biayaBase = (int)$armada['price'];
            $daySpan = max(1, ceil($durJam / 24));
            $biaya = $biayaBase * $daySpan;
            if ($statusPenyewaan === 'Dengan Driver') {
                // tambah biaya driver kalau ada tabel driver
                $driver = $db->table('driver')->get()->getRowArray();
                $biaya += (int)($driver['biaya'] ?? 0);
            }

            $rows[] = [
                'id' => $id,
                'user_id' => $user['id'],
                'armada_id' => $armada['id'],
                'email' => $user['email'],
                'fullname' => $user['fullname'] ?? $user['username'],
                'no_telp' => '08123' . rand(100000, 999999),
                'alamat' => 'Alamat dummy ' . rand(1, 99),
                'duration' => $daySpan . ' hari',
                'catatan' => 'Catatan dummy ke-' . ($i + 1),
                'pickup_date' => date('Y-m-d H:i:s', $pickup),
                'return_date' => date('Y-m-d H:i:s', $return),
                'status_penyewaan' => $statusPenyewaan,
                'status_transaksi' => $statusTransaksi,
                'biaya_sewa' => $biaya,
                'ktp' => null,
                'kk' => null,
                'bukti_pembayaran' => null,
                'cancelled_reason' => $statusTransaksi === 'Dibatalkan' ? 'Alasan dummy pembatalan' : null,
                'cancelled_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Insert batch (abaikan duplikasi id kalau rerun)
        foreach ($rows as $r) {
            $exists = $db->table('transaksi')->where('id', $r['id'])->get()->getRowArray();
            if (!$exists) {
                $db->table('transaksi')->insert($r);
            }
        }

        echo "Dummy transaksi ditambahkan: " . count($rows) . " baris.\n";
    }
}
