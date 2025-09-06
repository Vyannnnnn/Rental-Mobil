<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Armada extends BaseController
{
    protected $db;
    function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $getArmada = $this->db->table('armada')->get();

        $data = [
            'title' => 'Data Armada',
            'armada' => $getArmada->getResultArray()
        ];

        return view('admin/armada/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Armada'
        ];

        return view('admin/armada/tambah', $data);
    }

    public function add()
    {
        if (!$this->validate([
            'id' => [
                'rules' => 'is_unique[armada.id]',
                'errors' => [
                    'is_unique' => 'Kode barang sudah digunakan.',
                ]
            ],
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama merk harus diisi.'
                ]
            ],
            'model' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama model harus diisi.'
                ]
            ],
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama type harus diisi.'
                ]
            ],
            'desc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi armada harus diisi.'
                ]
            ],
            'year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun produksi armada harus diisi.'
                ]
            ],
            'plat_no' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Plat nomor armada harus diisi.'
                ]
            ],
            'capacity' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapasitas armada harus diisi.'
                ]
            ],
            'transmission' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Transmisi kendaraan harus diisi.'
                ]
            ],
            'fuel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan bakar armada harus diisi.'
                ]
            ],
            'color' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna kendaraan harus diisi.'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status armada harus diisi.'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $id = 'ARM-' . random_string('numeric', 6);


        $image = $this->request->getFile('image');
        $fileImage = $image->getRandomName('image');
        $image->move('img', $fileImage);
        $data = [
            'id' => $id,
            'merk' => $this->request->getVar('merk'),
            'model' => $this->request->getVar('model'),
            'type' => $this->request->getVar('type'),
            'desc' => $this->request->getVar('desc'),
            'year' => $this->request->getVar('year'),
            'plat_no' => $this->request->getVar('plat_no'),
            'capacity' => $this->request->getVar('capacity'),
            'transmission' => $this->request->getVar('transmission'),
            'fuel' => $this->request->getVar('fuel'),
            'color' => $this->request->getVar('color'),
            'price' => $this->request->getVar('price'),
            'status' => $this->request->getVar('status'),
            'image' => $fileImage,
        ];

        $this->db->table('armada')->insert($data);

        session()->setFlashdata('berhasil', 'Data barang berhasil ditambahkan');
        return redirect()->to('data-armada');
    }

    public function edit($id)
    {
        $getData = $this->db->table('armada')->where('id', $id)->get();

        $data = [
            'title' => 'Edit Armada',
            'data' => $getData->getRowArray()
        ];

        return view('admin/armada/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $fileImage = $image->getRandomName('image');
            $image->move('img', $fileImage);

            $data = [
                'id' => $id,
                'merk' => $this->request->getVar('merk'),
                'model' => $this->request->getVar('model'),
                'type' => $this->request->getVar('type'),
                'desc' => $this->request->getVar('desc'),
                'year' => $this->request->getVar('year'),
                'plat_no' => $this->request->getVar('plat_no'),
                'capacity' => $this->request->getVar('capacity'),
                'transmission' => $this->request->getVar('transmission'),
                'fuel' => $this->request->getVar('fuel'),
                'color' => $this->request->getVar('color'),
                'price' => $this->request->getVar('price'),
                'status' => $this->request->getVar('status'),
                'image' => $fileImage,
            ];
        } else {
            $data = [
                'id' => $id,
                'merk' => $this->request->getVar('merk'),
                'model' => $this->request->getVar('model'),
                'type' => $this->request->getVar('type'),
                'desc' => $this->request->getVar('desc'),
                'year' => $this->request->getVar('year'),
                'plat_no' => $this->request->getVar('plat_no'),
                'capacity' => $this->request->getVar('capacity'),
                'transmission' => $this->request->getVar('transmission'),
                'fuel' => $this->request->getVar('fuel'),
                'color' => $this->request->getVar('color'),
                'price' => $this->request->getVar('price'),
                'status' => $this->request->getVar('status'),
            ];
        }

        $this->db->table('armada')->where('id', $id)->update($data);

        session()->setFlashdata('berhasil', 'Data barang berhasil diperbarui');
        return redirect()->to('data-armada');
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');

        $this->db->table('armada')->where('id', $id)->delete();

        session()->setFlashdata('berhasil', 'Selamat armada berhasil dihapus');
        return redirect()->back();
    }
}
