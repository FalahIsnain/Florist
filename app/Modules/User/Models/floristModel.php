<?php

namespace App\Modules\User\Models;

use CodeIgniter\Model;


use phpDocumentor\Reflection\PseudoTypes\False_;

class floristModel extends Model
{
    protected $table      = 'bunga';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'slug', 'id_jenis', 'id_buket', 'harga', 'detail_lengkap', 'gambar'];

    public  function getBunga()
    {
        return $this
            ->join('jenis', 'jenis.id_jenis=bunga.id_jenis')
            ->join('buket', 'buket.id_buket=bunga.id_buket')
            ->paginate(3, 'bunga');
    }

    public function getOne($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public  function getJenis()
    {
        return $this->db->table('jenis')
            ->get()->getResultArray();
    }

    public  function getBuket()
    {
        return $this->db->table('buket')
            ->get()->getResultArray();
    }
}
