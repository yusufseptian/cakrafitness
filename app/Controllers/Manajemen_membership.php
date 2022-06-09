<?php

namespace App\Controllers;

use App\Models\manajemen_membership_model;
use App\Models\Model_transaksi_member;

class Manajemen_membership extends BaseController
{
    private $builder = null;
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('t_member');
    }
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
            $tgl_daftar = $this->request->getVar('m_tgl_daftar');
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
                    'm_tgl_habis' => date('y-m-d', strtotime('1 month', strtotime($tgl_daftar))),
                    'm_status' => 'Member Baru',
                    'm_harga_id'  => '1',
                    'm_us_id' => '1'
                ];
                //tangkap member id
                $mhs = new manajemen_membership_model();
                $mhs->insert($simpandata);

                $id = $this->builder->orderBy('m_id', 'DESC');
                $id->limit(1);



                $simpantransaksi = [
                    'tm_id' => $this->request->getVar('tm_id'),
                    'tm_member_id' => $id->get()->getResultArray()[0]['m_id'],
                    'tm_us_id' => '1',
                    'tm_harga_id' => '1',
                    'tm_status' => 'Member Baru',
                    'tm_tanggal' => date('Y-m-d H:i:s')

                ];

                $trans = new Model_transaksi_member();
                $trans->insert($simpantransaksi);

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
                'm_tgl_daftar' => $row['m_tgl_daftar']
            ];
            $msg = [
                'sukses' => view('manajemen_membership/edit_membership', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {
        $tgl_daftar = $this->request->getVar('m_tgl_daftar');
        if ($this->request->isAJAX()) {

            $simpandata = [
                'm_nama' => $this->request->getVar('m_nama'),
                'm_alamat' => $this->request->getVar('m_alamat'),
                'm_jk' => $this->request->getVar('m_jk'),
                'm_tgl_daftar' => $this->request->getVar('m_tgl_daftar'),
                'm_tgl_habis' => date('y-m-d', strtotime('+1 month', strtotime($tgl_daftar))),

            ];
            $mhs = new manajemen_membership_model();

            $m_id = $this->request->getVar('m_id');
            $mhs->update($m_id, $simpandata);
            $simpantransaksi = [
                'tm_id' => $this->request->getVar('tm_id'),
                'tm_member_id' => $this->request->getVar('m_id'),
                'tm_us_id' => '1',
                'tm_harga_id' => '1',
                'tm_status' => 'Member Diperpanjang',
                'tm_tanggal' => date('Y-m-d H:i:s')

            ];
            $trans = new Model_transaksi_member();
            $trans->insert($simpantransaksi);
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
