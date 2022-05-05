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
    public function test()
    {
        echo password_hash('admin1', PASSWORD_BCRYPT);
    }
    public function cekuser()
    {
        if ($this->request->isAJAX()) {
            $us_id = $this->request->getVar('us_id');
            $us_password = $this->request->getVar('us_password');

            $validation = \config\Services::validation();

            $valid = $this->validate([
                'us_id' => [
                    'label' => 'ID User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'us_password' => [
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
                        'us_id' => $validation->getError('us_id'),
                        'us_password' => $validation->getError('us_password')
                    ]
                ];
            } else {
                //logika cek user
                $query_cek_user = $this->db->query("SELECT * FROM t_user JOIN t_level ON level_id = us_level_id WHERE us_id = '$us_id'
                ");

                $result = $query_cek_user->getResult();

                if (count($result) > 0) {
                    $row = $query_cek_user->getRow();
                    $password_user = $row->us_password;

                    if (password_verify($us_password, $password_user)) {
                        //buat session
                        $simpan_session = [
                            'login' => true,
                            'us_id' => $us_id,
                            'user_name' => $row->us_username,
                            'us_level_id' => $row->us_level_id,
                            'level_nama' => $row->level_nama
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
                                'us_password' => 'Maaf Password anda salah'
                            ]
                        ];
                    }
                } else {
                    $msg =  [
                        'error' => [
                            'us_id' => 'Maaf Id User tidak ditemukan'
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
