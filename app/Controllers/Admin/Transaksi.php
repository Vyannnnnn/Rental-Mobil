<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Transaksi extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $getAllTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->get();

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $getAllTransaction->getResultArray()
        ];

        return view('admin/transaksi/index', $data);
    }

    public function detail($id)
    {
        $getTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->where('transaksi.id', $id)
            ->get();

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $getTransaction->getRowArray()
        ];

        return view('admin/transaksi/detail', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $data = [
            'status_transaksi' => $this->request->getVar('status_transaksi')
        ];

        $this->db->table('transaksi')->where('id', $id)->update($data);

        session()->setFlashdata('berhasil', 'Selamat status transaksi berhasil diubah!');
        return redirect()->to('data-transaksi');
    }

    public function proses()
    {
        $getAllTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->where('status_transaksi', 'Diproses')
            ->get();

        $data = [
            'title' => 'Transaksi Proses',
            'transaksi' => $getAllTransaction->getResultArray()
        ];

        return view('admin/transaksi/proses', $data);
    }

    public function rent()
    {
        $getAllTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->where('status_transaksi', 'Disewa')
            ->get();

        $data = [
            'title' => 'Transaksi Disewa',
            'transaksi' => $getAllTransaction->getResultArray()
        ];


        return view('admin/transaksi/rent', $data);
    }

    public function success()
    {
        $getAllTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->where('status_transaksi', 'Selesai')
            ->get();

        $data = [
            'title' => 'Transaksi Selesai',
            'transaksi' => $getAllTransaction->getResultArray()
        ];

        return view('admin/transaksi/success', $data);
    }

    public function cancel()
    {
        $getAllTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id', 'left')
            ->where('status_transaksi', 'Dibatalkan')
            ->get();

        $data = [
            'title' => 'Transaksi Dibatalkan',
            'transaksi' => $getAllTransaction->getResultArray()
        ];


        return view('admin/transaksi/cancel', $data);
    }
}
