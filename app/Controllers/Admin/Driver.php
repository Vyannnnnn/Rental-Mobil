<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Driver extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $getPriceDriver = $this->db->table('driver')->get();
        $data = [
            'title' => 'Tarif Driver',
            'driver' => $getPriceDriver->getRowArray()
        ];

        return view('admin/driver/index', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Biaya driver tidak boleh kosong.',
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $id = $this->request->getVar('id');
        $data = ['biaya' => $this->request->getVar('biaya')];

        $this->db->table('driver')->where('id', $id)->update($data);

        session()->setFlashdata('berhasil', 'Biaya driver berhasil diperbarui');
        return redirect()->to('driver');
    }
}
