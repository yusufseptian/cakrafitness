<?php

namespace App\Controllers;

use App\Models\manajemen_membership_model;

class Manajemen_membership extends BaseController
{
    public function index()
    {


        return view('manajemen_membership/index');
    }
    public function ambildata()
    {
        // $builder = $db->table('blogs');
        // $builder->select('*');
        // $builder->join('comments', 'comments.id = blogs.id');
        // $query = $builder->get();
        if ($this->request->isAJAX()) {
            $mhs = new manajemen_membership_model();
            $data = [
                'tampildata' => $mhs->get_member()
            ];
            $msg = [
                'data' => view('manajemen_membership/data_membership', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Tidak Dapat Diproses');
        }
    }
    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('manajemen_membership/tambah_membership')
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
                'member_nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'member_alamat' => [
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
                        'member_nama' => $validation->getError('member_nama'),
                        'member_alamat' => $validation->getError('member_alamat')
                    ]
                ];
            } else {
                $simpandata = [
                    'member_id' => $this->request->getVar('member_id'),
                    'member_nama' => $this->request->getVar('member_nama'),
                    'member_alamat' => $this->request->getVar('member_alamat'),
                    'member_jk' => $this->request->getVar('member_jk'),
                    'member_tgl_daftar' => $this->request->getVar('member_tgl_daftar')
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
            $member_id = $this->request->getVar('member_id');

            $mhs = new manajemen_membership_model();
            $row = $mhs->find($member_id);

            $data = [
                'member_id' => $row['member_id'],
                'member_nama' => $row['member_nama'],
                'member_alamat' => $row['member_alamat'],
                'member_jk' => $row['member_jk'],
                'member_tgl_daftar' => $row['member_tgl_daftar'],
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
                'member_nama' => $this->request->getVar('member_nama'),
                'member_alamat' => $this->request->getVar('member_alamat'),
                'member_jk' => $this->request->getVar('member_jk'),
                'member_tgl_daftar' => $this->request->getVar('member_tgl_daftar'),
            ];
            $mhs = new manajemen_membership_model();

            $member_id = $this->request->getVar('member_id');
            $mhs->update($member_id, $simpandata);

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
            $member_id = $this->request->getVar('member_id');
            $mhs = new manajemen_membership_model();
            $mhs->delete($member_id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
