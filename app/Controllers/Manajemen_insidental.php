<?php

namespace App\Controllers;

use App\Models\manajemen_insidental_model;

class Manajemen_insidental extends BaseController
{
    public function index()
    {
        $tbl = new manajemen_insidental_model();
        $data = [
            'tampildata' => $tbl->get_data()
        ];

        return view('manajemen_insidental/index', $data);
    }
    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('manajemen_insidental/tambah_insidental')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'in_nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'in_nama' => $validation->getError('in_nama')
                    ]
                ];
            } else {
                $simpandata = [
                    'in_id' => $this->request->getVar('in_id'),
                    'in_nama' => $this->request->getVar('in_nama'),
                    'in_tgl' => $this->request->getVar('in_tgl'),
                    'in_status' => $this->request->getVar('in_status'),
                    'in_harga_id'  => '2',
                    'in_us_id' => '1'
                ];
                $tbl = new manajemen_insidental_model();
                $tbl->insert($simpandata);

                $msg = [
                    'sukses' => 'Data Member berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $in_id = $this->request->getVar('in_id');

            $tbl = new manajemen_insidental_model();
            $row = $tbl->find($in_id);

            $data = [
                'in_id' => $row['in_id'],
                'in_nama' => $row['in_nama'],
                'in_tgl' => $row['in_tgl'],
                'in_status' => $row['in_status'],

            ];
            $msg = [
                'sukses' => view('manajemen_insidental/edit_insidental', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {

        if ($this->request->isAJAX()) {

            $simpandata = [
                'in_nama' => $this->request->getVar('in_nama'),
                'in_status' => $this->request->getVar('in_status'),
                'in_tgl' => $this->request->getVar('in_tgl'),

            ];
            $tbl = new manajemen_insidental_model();

            $in_id = $this->request->getVar('in_id');
            $tbl->update($in_id, $simpandata);

            $msg = [
                'sukses' => 'Data Member berhasil diubah'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $in_id = $this->request->getVar('in_id');
            $tbl = new manajemen_insidental_model();
            $tbl->delete($in_id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
