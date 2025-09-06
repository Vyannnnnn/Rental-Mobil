<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Dashboard extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $countAllUser = $this->db->table('users')->countAllResults();

        $countAllArmada = $this->db->table('armada')->countAllResults();

        // Gunakan COALESCE agar tidak mengembalikan NULL ketika belum ada transaksi selesai
        $countProfit = $this->db->table('transaksi')
            ->select('COALESCE(SUM(transaksi.biaya_sewa),0) as pendapatan')
            ->where('status_transaksi', 'Selesai')
            ->get();

        $countSuccess = $this->db->table('transaksi')->where('status_transaksi', 'Selesai')->countAllResults();

        $getAllTransaksi = $this->db->table('transaksi')
            ->where('status_transaksi', 'Diproses')
            ->orderBy('pickup_date', 'ASC')
            ->limit(5)
            ->get();

        $getAllSelesai = $this->db->table('transaksi')
            ->where('status_transaksi', 'Selesai')
            ->orderBy('pickup_date', 'ASC')
            ->limit(5)
            ->get();

        $data = [
            'title' => 'Dashboard Admin',
            'transaksi' => $getAllTransaksi->getResultArray(),
            'transaksi_selesai' => $getAllSelesai->getResultArray(),
            'user' => $countAllUser,
            'armada' => $countAllArmada,
            'selesai' => $countSuccess,
            'pendapatan' =>  $countProfit->getRowArray()
        ];

        return view('admin/dashboard/index', $data);
    }
}
