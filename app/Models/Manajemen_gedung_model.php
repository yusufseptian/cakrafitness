<?php

namespace App\Models;

use CodeIgniter\Model;

class manajemen_gedung_model extends Model
{
    protected $table = 't_sewagedung';
    protected $primaryKey = 'gd_id';
    protected $allowedFields = [
        'gd_id',
        'gd_nama',
        'gd_tgl_sewa',
        'gd_lama_sewa',
        'gd_harga_id',
        'gd_us_id'
    ];

    public function get_data()
    {
        return $this->db->table('t_sewagedung')
            ->join('t_harga', 't_harga.harga_id = t_sewagedung.gd_harga_id')
            ->join('t_user', 't_user.us_id = t_sewagedung.gd_us_id')
            ->get()->getResultArray();
    }
}
