<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Unggul Rent Car'
        ];

        return view('user/about/index', $data);
    }
}
