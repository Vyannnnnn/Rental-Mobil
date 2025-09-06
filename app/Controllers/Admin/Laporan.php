<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Laporan extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        // Default struktur agar view tidak error ketika kosong
        $getAllTransaction = [];
        $totalPendapatan = ['pendapatan' => 0];
        $totalTransaksi = ['success' => 0];
        $totalTransaksiCancel = ['cancel' => 0];

        // Builder dasar (ambil semua status supaya tidak kosong kalau belum ada yang "Selesai")
        $builder = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id')
            ->orderBy('pickup_date', 'ASC');

        $applyDateFilter = false;
        if ($start_date && $end_date) {
            // Normalisasi ke rentang penuh hari
            $start = $start_date . ' 00:00:00';
            $end = $end_date . ' 23:59:59';
            $builder->where('pickup_date >=', $start)
                ->where('pickup_date <=', $end);
            $applyDateFilter = true;
        }

        // Ambil semua transaksi (semua status) untuk tabel
        $getAllTransaction = $builder->get()->getResultArray();

        // Hitung hanya yang selesai & dibatalkan (dengan filter tanggal kalau ada)
        $sumBuilder = $this->db->table('transaksi');
        $successBuilder = $this->db->table('transaksi');
        $cancelBuilder = $this->db->table('transaksi');
        if ($applyDateFilter) {
            $sumBuilder->where('pickup_date >=', $start)->where('pickup_date <=', $end);
            $successBuilder->where('pickup_date >=', $start)->where('pickup_date <=', $end);
            $cancelBuilder->where('pickup_date >=', $start)->where('pickup_date <=', $end);
        }
        $totalPendapatan = $sumBuilder->select('COALESCE(SUM(biaya_sewa),0) as pendapatan')->where('status_transaksi', 'Selesai')->get()->getRowArray();
        $totalTransaksi = $successBuilder->select('COUNT(id) as success')->where('status_transaksi', 'Selesai')->get()->getRowArray();
        $totalTransaksiCancel = $cancelBuilder->select('COUNT(id) as cancel')->where('status_transaksi', 'Dibatalkan')->get()->getRowArray();

        $data = [
            'title' => 'Laporan Penyewaan',
            'transaksi' => $getAllTransaction,
            'total_pendapatan' => $totalPendapatan,
            'total_transaksi' => $totalTransaksi,
            'total_transaksi_cancel' => $totalTransaksiCancel,
        ];

        return view('admin/laporan/index', $data);
    }
}
