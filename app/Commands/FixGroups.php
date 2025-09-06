<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Myth\Auth\Password;

/**
 * CLI: php spark fix:groups email@example.com [admin]
 * - Membuat grup 'user' dan 'admin' jika belum ada.
 * - Membuat user jika email belum ada (password default ditampilkan).
 * - Menambahkan mapping user -> group 'user'.
 * - Jika parameter kedua 'admin' diberikan, juga tambah ke grup admin.
 */
class FixGroups extends BaseCommand
{
    protected $group       = 'app';
    protected $name        = 'fix:groups';
    protected $description = 'Auto-fix mapping user ke auth groups (user/admin).';

    public function run(array $params)
    {
        $email = $params[0] ?? null;
        $addAdmin = isset($params[1]) && strtolower($params[1]) === 'admin';

        if (!$email) {
            CLI::write('Usage: php spark fix:groups email@example.com [admin]', 'yellow');
            return;
        }

        $db = \Config\Database::connect();

        // Pastikan tabel inti ada
        $required = ['users', 'auth_groups', 'auth_groups_users'];
        foreach ($required as $t) {
            if (!$db->tableExists($t)) {
                CLI::error("Tabel '$t' belum ada. Jalankan: php spark migrate -n Myth/Auth");
                return;
            }
        }

        // Pastikan grup user & admin ada
        $groupsNeeded = [
            'user'  => 'Regular User',
            'admin' => 'Administrator'
        ];
        foreach ($groupsNeeded as $name => $desc) {
            $g = $db->table('auth_groups')->where('name', $name)->get()->getRowArray();
            if (!$g) {
                $db->table('auth_groups')->insert(['name' => $name, 'description' => $desc]);
                CLI::write("Grup '$name' dibuat.", 'green');
            }
        }

        $user = $db->table('users')->where('email', $email)->get()->getRowArray();
        $generatedPass = null;
        if (!$user) {
            $generatedPass = 'Pass' . bin2hex(random_bytes(3));
            $db->table('users')->insert([
                'email' => $email,
                'username' => strtok($email, '@'),
                'fullname' => 'Auto Created',
                'password_hash' => Password::hash($generatedPass),
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $userId = $db->insertID();
            $user = $db->table('users')->where('id', $userId)->get()->getRowArray();
            CLI::write("User baru dibuat: $email (password: $generatedPass)", 'green');
        }

        $userId = $user['id'];

        $groupUser = $db->table('auth_groups')->where('name', 'user')->get()->getRowArray();
        $groupAdmin = $db->table('auth_groups')->where('name', 'admin')->get()->getRowArray();

        // Tambah ke grup user
        $existsUser = $db->table('auth_groups_users')->where('group_id', $groupUser['id'])->where('user_id', $userId)->get()->getRowArray();
        if (!$existsUser) {
            $db->table('auth_groups_users')->insert(['group_id' => $groupUser['id'], 'user_id' => $userId]);
            CLI::write("Mapping user -> group 'user' ditambahkan.", 'green');
        } else {
            CLI::write("Sudah ada mapping ke grup 'user'.", 'yellow');
        }

        if ($addAdmin) {
            $existsAdmin = $db->table('auth_groups_users')->where('group_id', $groupAdmin['id'])->where('user_id', $userId)->get()->getRowArray();
            if (!$existsAdmin) {
                $db->table('auth_groups_users')->insert(['group_id' => $groupAdmin['id'], 'user_id' => $userId]);
                CLI::write("Mapping user -> group 'admin' ditambahkan.", 'green');
            } else {
                CLI::write("Sudah ada mapping ke grup 'admin'.", 'yellow');
            }
        }

        CLI::write('Selesai.', 'green');
        if ($generatedPass) {
            CLI::write('Segera ganti password default setelah login.', 'yellow');
        }
    }
}
