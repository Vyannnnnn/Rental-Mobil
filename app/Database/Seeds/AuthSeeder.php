<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Password;
use CodeIgniter\CLI\CLI;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Pastikan tabel-tabel auth sudah ada (dari migrasi Myth/Auth)
        $requiredTables = [
            'users', 'auth_groups', 'auth_groups_users'
        ];
        $missing = [];
        foreach ($requiredTables as $t) {
            if (!$db->tableExists($t)) {
                $missing[] = $t;
            }
        }
        if ($missing) {
            // Pesan ramah di CLI lalu hentikan tanpa error fatal.
            if (class_exists(CLI::class)) {
                CLI::write('Seeder dihentikan. Tabel berikut belum ada: '.implode(', ', $missing), 'yellow');
                CLI::write('Jalankan migrasi Myth/Auth dulu: php spark migrate -n Myth/Auth', 'yellow');
            }
            return; // hentikan seeding karena dependensi belum siap
        }

        // Seed groups (admin, user) jika belum ada
        $groups = [
            ['name' => 'admin', 'description' => 'Administrator'],
            ['name' => 'user',  'description' => 'Regular User'],
        ];
    foreach ($groups as $g) {
            $existing = $db->table('auth_groups')->where('name', $g['name'])->get()->getRowArray();
            if (!$existing) {
                $db->table('auth_groups')->insert($g);
            }
        }

        // Ambil id group
        $adminGroup = $db->table('auth_groups')->where('name', 'admin')->get()->getRowArray();
        $userGroup  = $db->table('auth_groups')->where('name', 'user')->get()->getRowArray();

        // Seed admin user jika belum ada
        $adminEmail = 'admin@example.com';
        $existingAdmin = $db->table('users')->where('email', $adminEmail)->get()->getRowArray();
        if (!$existingAdmin) {
            $db->table('users')->insert([
                'email'         => $adminEmail,
                'fullname'      => 'Administrator',
                'username'      => 'admin',
                'password_hash' => Password::hash('admin123'), // ganti setelah login pertama
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
            $adminUserId = $db->insertID();
            if ($adminGroup) {
                $db->table('auth_groups_users')->insert([
                    'group_id' => $adminGroup['id'],
                    'user_id'  => $adminUserId,
                ]);
            }
        }

        // (Opsional) tambah user contoh biasa
        $userEmail = 'user@example.com';
        $existingUser = $db->table('users')->where('email', $userEmail)->get()->getRowArray();
        if (!$existingUser) {
            $db->table('users')->insert([
                'email'         => $userEmail,
                'fullname'      => 'Sample User',
                'username'      => 'userdemo',
                'password_hash' => Password::hash('user12345'),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
            $userId = $db->insertID();
            if ($userGroup) {
                $db->table('auth_groups_users')->insert([
                    'group_id' => $userGroup['id'],
                    'user_id'  => $userId,
                ]);
            }
        }
    }
}
