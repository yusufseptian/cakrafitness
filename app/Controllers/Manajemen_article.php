<?php

namespace App\Controllers;

use App\Models\manajemen_article_model;

class Manajemen_article extends BaseController
{
    public function index()
    {
        return view('manajemen_article/index');
    }
    public function ambildata()
    {

        if ($this->request->isAJAX()) {
            $tbl = new manajemen_article_model();
            $data = [
                'tampildata' => $tbl->get_data()
            ];
            $msg = [
                'data' => view('manajemen_article/data_article', $data)
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
                'data' => view('manajemen_article/tambah_article')
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
                'article_judul' => [
                    'label' => 'Judul',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'article_isi' => [
                    'label' => 'Konten',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'article_judul' => $validation->getError('article_judul'),
                        'article_isi' => $validation->getError('article_isi')
                    ]
                ];
            } else {
                $simpandata = [
                    'article_id' => $this->request->getVar('article_id'),
                    'article_judul' => $this->request->getVar('article_judul'),
                    'article_sampul' => $this->request->getVar('article_sampul'),
                    'article_isi' => $this->request->getVar('article_isi'),
                    'article_user_id' => '1'
                ];
                $tbl = new manajemen_article_model();
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
            $article_id = $this->request->getVar('article_id');

            $tbl = new manajemen_article_model();
            $row = $tbl->find($article_id);

            $data = [
                'article_id' => $row['article_id'],
                'article_judul' => $row['article_judul'],
                'article_sampul' => $row['article_sampul'],
                'article_isi' => $row['article_isi']
            ];
            $msg = [
                'sukses' => view('manajemen_article/edit_article', $data)
            ];

            echo json_encode($msg);
        }
    }
    public function updatedata()
    {

        if ($this->request->isAJAX()) {

            $simpandata = [
                'article_judul' => $this->request->getVar('article_judul'),
                'article_sampul' => $this->request->getVar('article_sampul'),
                'article_isi' => $this->request->getVar('article_isi'),
            ];
            $tbl = new manajemen_article_model();

            $article_id = $this->request->getVar('article_id');
            $tbl->update($article_id, $simpandata);

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
            $article_id = $this->request->getVar('article_id');
            $tbl = new manajemen_article_model();
            $tbl->delete($article_id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
