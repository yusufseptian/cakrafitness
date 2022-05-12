<?php

namespace App\Controllers;

use App\Models\manajemen_harga_model;

class Manajemen_harga extends BaseController
{
    public function index()
    {
        return view('manajemen_harga/index');
    }
    public function ambildata()
    {

        if ($this->request->isAJAX()) {
            $tbl = new manajemen_harga_model();
            $data = [
                'tampildata' => $tbl->findAll()
            ];
            $msg = [
                'data' => view('manajemen_harga/data_harga', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $harga_id = $this->request->getVar('harga_id');

            $tbl = new manajemen_harga_model();
            $row = $tbl->find($harga_id);

            $data = [
                'harga_id' => $row['harga_id'],
                'harga' => $row['harga'],
                'harga_keterangan' => $row['harga_keterangan'],
            ];
            $msg = [
                'sukses' => view('manajemen_harga/edit_harga', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {

        if ($this->request->isAJAX()) {

            $simpandata = [
                'harga' => $this->request->getVar('harga'),
            ];
            $tbl = new manajemen_harga_model();

            $harga_id = $this->request->getVar('harga_id');
            $tbl->update($harga_id, $simpandata);

            $msg = [
                'sukses' => 'Data Member berhasil diubah'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
