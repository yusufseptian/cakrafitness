<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_transaksi_member extends Model
{
    protected $table = 't_trans_member';
    protected $primaryKey = 'tm_id';
    protected $allowedFields = [
        'tm_id',
        'tm_member_id',
        'tm_us_id',
        'tm_status',
        'tm_tanggal',
        'tm_harga_id'
    ];

    public function get_member()
    {
        return $this->db->table('t_trans_member')
            ->join('t_member', 't_member.m_id = t_trans_member.tm_member_id')
            ->join('t_harga', 't_harga.harga_id = t_trans_member.tm_harga_id')
            ->get()->getResultArray();
    }
}
