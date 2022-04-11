<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        return view('login/index');
    }
    public function cekuser()
    {
        if ($this->request->isAJAX()) {
            $id_user = $this->request->getVar('id_user');
            $user_pass = $this->request->getVar('user_pass');

            $validation = \config\Services::validation();

            $valid = $this->validate([
                'id_user' => [
                    'label' => 'ID User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'user_pass' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_user' => $validation->getError('id_user'),
                        'user_pass' => $validation->getError('user_pass')
                    ]
                ];
            } else {
                //logika cek user
                $query_cek_user = $this->db->query("SELECT * FROM tb_user JOIN tb_level ON level_id = users_level_id WHERE id_user = '$id_user'
                ");

                $result = $query_cek_user->getResult();

                if (count($result) > 0) {
                    $row = $query_cek_user->getRow();
                    $password_user = $row->user_pass;

                    if (password_verify($user_pass, $password_user)) {
                        //buat session
                        $simpan_session = [
                            'login' => true,
                            'id_user' => $id_user,
                            'user_name' => $row->username,
                            'id_level' => $row->users_level_id,
                            'namalevel' => $row->level_nama
                        ];
                        $this->session->set($simpan_session);

                        $msg = [
                            'sukses' => [
                                'link' => '/Layout_admin/index'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'user_pass' => 'Maaf Password anda salah'
                            ]
                        ];
                    }
                } else {
                    $msg =  [
                        'error' => [
                            'id_user' => 'Maaf Id User tidak ditemukan'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        }
    }
    public function keluar()
    {
        $this->session->destroy();
        return redirect()->to('/login/index');
    }
}
