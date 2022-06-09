<?php

namespace App\Controllers;

use App\Models\Model_transaksi_member;

class Manajemen_transaksi extends BaseController
{
    public function index()
    {
        $mhs = new Model_transaksi_member();
        $data = [
            'tampildata' => $mhs->get_member()
        ];

        return view('manajemen_transaksi/index', $data);
    }
}
