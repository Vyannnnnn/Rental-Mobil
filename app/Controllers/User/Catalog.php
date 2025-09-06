<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use PSpell\Config;

class Catalog extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $getAllCar = $this->db->table('armada')->get();
        $getType = $this->db->table('armada')->groupBy('type')->get();

        $data = [
            'title' => 'Unggul Rent Car',
            'armada' => $getAllCar->getResultArray(),
            'type' => $getType->getResultArray()
        ];

        return view('user/catalog/index', $data);
    }

    public function detail($id)
    {
        $getCar = $this->db->table('armada')->where('id', $id)->get();

        $data = [
            'title' => 'Unggul Rent Car',
            'item' => $getCar->getRowArray()
        ];

        return view('user/catalog/detail', $data);
    }
}
