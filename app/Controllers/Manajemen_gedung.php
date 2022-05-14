<?php

namespace App\Controllers;

use App\Models\manajemen_gedung_model;

class Manajemen_gedung extends BaseController
{
    public function index()
    {
        $tbl = new manajemen_gedung_model();
        $data = [
            'tampildata' => $tbl->get_data()
        ];
        return view('manajemen_gedung/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('manajemen_gedung/tambah_sewa_gedung')
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
                'gd_nama' => [
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
                        'gd_nama' => $validation->getError('gd_nama')
                    ]
                ];
            } else {
                $simpandata = [
                    'gd_id' => $this->request->getVar('gd_id'),
                    'gd_nama' => $this->request->getVar('gd_nama'),
                    'gd_tgl_sewa' => $this->request->getVar('gd_tgl_sewa'),
                    'gd_lama_sewa' => $this->request->getVar('gd_lama_sewa'),
                    'gd_harga_id'  => '2',
                    'gd_us_id' => '1'
                ];
                $tbl = new manajemen_gedung_model();
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
            $gd_id = $this->request->getVar('gd_id');

            $tbl = new manajemen_gedung_model();
            $row = $tbl->find($gd_id);

            $data = [
                'gd_id' => $row['gd_id'],
                'gd_nama' => $row['gd_nama'],
                'gd_tgl_sewa' => $row['gd_tgl_sewa'],
                'gd_lama_sewa' => $row['gd_lama_sewa'],

            ];
            $msg = [
                'sukses' => view('manajemen_gedung/edit_sewa_gedung', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {

        if ($this->request->isAJAX()) {

            $simpandata = [
                'gd_nama' => $this->request->getVar('gd_nama'),
                'gd_lama_sewa' => $this->request->getVar('gd_lama_sewa'),
                'gd_tgl_sewa' => $this->request->getVar('gd_tgl_sewa'),

            ];
            $tbl = new manajemen_gedung_model();

            $gd_id = $this->request->getVar('gd_id');
            $tbl->update($gd_id, $simpandata);

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
            $gd_id = $this->request->getVar('gd_id');
            $tbl = new manajemen_gedung_model();
            $tbl->delete($gd_id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
