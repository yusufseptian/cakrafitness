<?php

namespace App\Models;

use CodeIgniter\Model;

class manajemen_harga_model extends Model
{
    protected $table = 't_harga';
    protected $primaryKey = 'harga_id';
    protected $allowedFields = [
        'harga_id',
        'harga',
        'harga_keterangan'
    ];
}
