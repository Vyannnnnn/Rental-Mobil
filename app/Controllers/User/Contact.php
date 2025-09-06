<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Unggul Rent Car'
        ];

        return view('user/contact/index', $data);
    }
}
