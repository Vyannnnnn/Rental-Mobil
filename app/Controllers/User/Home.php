<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use Config\Database;

class Home extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function checkUser()
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                return redirect()->to("/dashboard");
            } else {
                return redirect()->to('/home');
            }
        } else {
            return redirect()->to('/home');
        }
    }

    public function index()
    {
        $getCar = $this->db->table('armada')->orderBy('id', 'ASC')->limit(5)->get();

        $data = [
            'title' => 'Home',
            'armada' => $getCar->getResultArray()
        ];

        return view('user/home/index', $data);
    }
}
