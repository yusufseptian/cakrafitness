<?php

namespace App\Models;

use CodeIgniter\Model;

class manajemen_membership_model extends Model
{
    protected $table = 't_member';
    protected $primaryKey = 'm_id';
    protected $allowedFields = [
        'm_id',
        'm_nama',
        'm_alamat',
        'm_jk',
        'm_tgl_daftar',
        'm_tgl_habis',
        'm_harga_id',
        'm_status',
        'm_us_id'
    ];

    public function get_member()
    {
        return $this->db->table('t_member')
            ->join('t_harga', 't_harga.harga_id = t_member.m_harga_id')
            ->join('t_user', 't_user.us_id = t_member.m_us_id')
            ->get()->getResultArray();
    }
}
