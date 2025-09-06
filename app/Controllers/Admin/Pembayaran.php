<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Pembayaran extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $getRekening = $this->db->table('rekening')->get();

        $data = [
            'title' => 'Data Pembayaran',
            'rekening' => $getRekening->getRowArray()
        ];

        return view('admin/pembayaran/index', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'bank' => $this->request->getVar('bank'),
            'no_rek' => $this->request->getVar('no_rek')
        ];

        $this->db->table('rekening')->where('id', $id)->update($data);
        session()->setFlashdata('berhasil', 'Selamat data rekening berhasil diperbarui!!!');
        return redirect()->to('pembayaran');
    }
}
