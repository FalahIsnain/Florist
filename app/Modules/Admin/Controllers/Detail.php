<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\floristModel;
use App\Modules\Admin\Models\buketModel;
use App\Modules\Admin\Models\jenisModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class Detail extends BaseController
{
    protected $floristModel;
    protected $jenisModel;
    protected $buketModel;
    public function __construct()
    {
        $this->floristModel = new floristModel();
        $this->buketModel = new buketModel();
        $this->jenisModel = new jenisModel();
    }
    public function detail($slug)
    {
        helper(['form', 'url']);

        $data = $this->floristModel->where(['slug' => $slug])->first();
        $bungaDetail = $this->floristModel->where(['slug' => $slug])->first();
        $jenisDetail = $this->jenisModel->where(['id_jenis' => $data['id_jenis']])->first();
        $buketDetail = $this->buketModel->where(['id_buket' => $data['id_buket']])->first();

        $data = [
            'title' => 'Detail Bunga',
            'bunga' => $bungaDetail,
            'jenis' => $jenisDetail,
            'buket' => $buketDetail
        ];

        if (empty($data['bunga'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('bunga' . $slug . ' Tidak ada');
        }

        return view('App\Modules\Admin\Views\florist\detail', $data);
    }
}
