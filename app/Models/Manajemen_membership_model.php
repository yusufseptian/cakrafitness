<?php 
namespace App\Models;
use CodeIgniter\Model;

class manajemen_membership_model extends Model{
    protected $table = 'tb_member';
    protected $primaryKey = 'member_id';
    protected $allowedFields = ['member_id','member_nama','member_alamat','member_jk','member_tgl_daftar'];
}
