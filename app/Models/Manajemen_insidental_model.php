<?php

namespace App\Models;

use CodeIgniter\Model;

class manajemen_insidental_model extends Model
{
    protected $table = 't_insidental';
    protected $primaryKey = 'in_id';
    protected $allowedFields = [
        'in_id',
        'in_nama',
        'in_tgl',
        'in_status',
        'in_harga_id',
        'in_us_id'
    ];

    public function get_data()
    {
        return $this->db->table('t_insidental')
            ->join('t_harga', 't_harga.harga_id = t_insidental.in_harga_id')
            ->join('t_user', 't_user.us_id = t_insidental.in_us_id')
            ->get()->getResultArray();
    }
}
