<?php

namespace App\Models;

use CodeIgniter\Model;

class manajemen_article_model extends Model
{
    protected $table = 't_article';
    protected $primaryKey = 'article_id';
    protected $allowedFields = [
        'article_id',
        'article_judul',
        'article_sampul',
        'article_isi',
        'article_user_id'
    ];

    public function get_data()
    {
        return $this->db->table('t_article')
            ->join('t_user', 't_user.us_id = t_article.article_user_id')
            ->get()->getResultArray();
    }
}
