<?php

namespace App\Controllers;

use App\Models\manajemen_membership_model;

class Manajemen_membership extends BaseController
{
    public function index()
    {

        $mhs = new manajemen_membership_model();
        $data = [
            'tampildata' => $mhs->get_member()
        ];

        return view('manajemen_membership/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => view('manajemen_membership/tambah_membership')
            ];
            echo json_encode($data);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'm_nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'm_alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'm_nama' => $validation->getError('m_nama'),
                        'm_alamat' => $validation->getError('m_alamat')
                    ]
                ];
            } else {
                $simpandata = [
                    'm_id' => $this->request->getVar('m_id'),
                    'm_nama' => $this->request->getVar('m_nama'),
                    'm_alamat' => $this->request->getVar('m_alamat'),
                    'm_jk' => $this->request->getVar('m_jk'),
                    'm_tgl_daftar' => $this->request->getVar('m_tgl_daftar'),
                    'm_tgl_habis' => $this->request->getVar('m_tgl_habis'),
                    'm_harga_id'  => '1',
                    'm_us_id' => '1'
                ];
                $mhs = new manajemen_membership_model();
                $mhs->insert($simpandata);

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
            $m_id = $this->request->getVar('m_id');

            $mhs = new manajemen_membership_model();
            $row = $mhs->find($m_id);

            $data = [
                'm_id' => $row['m_id'],
                'm_nama' => $row['m_nama'],
                'm_alamat' => $row['m_alamat'],
                'm_jk' => $row['m_jk'],
                'm_tgl_daftar' => $row['m_tgl_daftar'],
                'm_tgl_habis' => $row['m_tgl_habis'],
            ];
            $msg = [
                'sukses' => view('manajemen_membership/edit_membership', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {

        if ($this->request->isAJAX()) {

            $simpandata = [
                'm_nama' => $this->request->getVar('m_nama'),
                'm_alamat' => $this->request->getVar('m_alamat'),
                'm_jk' => $this->request->getVar('m_jk'),
                'm_tgl_daftar' => $this->request->getVar('m_tgl_daftar'),
                'm_tgl_habis' => $this->request->getVar('m_tgl_habis')
            ];
            $mhs = new manajemen_membership_model();

            $m_id = $this->request->getVar('m_id');
            $mhs->update($m_id, $simpandata);

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
            $m_id = $this->request->getVar('m_id');
            $mhs = new manajemen_membership_model();
            $mhs->delete($m_id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
