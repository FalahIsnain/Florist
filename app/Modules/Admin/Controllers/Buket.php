<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\buketModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class Buket extends BaseController
{
    protected $jenisModel;
    public function __construct()
    {
        $this->buketModel = new buketModel();
    }
    public function index()
    {
        helper(['form', 'url']);
        $data = [
            'title' => 'Data Jenis',
            'buket' => $this->buketModel->paginate(4, 'buket'),
            'pager' => $this->buketModel->pager,
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\buket\indexBuket', $data);
    }

    public function addBuket()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'tipe_buket' => [
                'rules' => 'required|is_unique[buket.tipe_buket]',
                'errors' => [
                    'required' => 'tipe buket harus diisi',
                    'is_unique'    => 'tipe buket sudah ada'
                ]
            ]
        ])) {
            return redirect()->to(base_url('Buket'))->withInput();
        }
        $dataBuket = [
            'tipe_buket' => $this->request->getPost('tipe_buket')
        ];
        $this->buketModel->save($dataBuket);
        session()->setFlashdata('pesan', 'data berhasil di save');
        return redirect()->to(base_url('Buket'));
    }


    public function delBUket($id_buket)
    {
        try {
            $this->buketModel->delete($id_buket);
            session()->setFlashdata('pesan', 'data berhasil di hapus');
            return redirect()->to(base_url('Buket'));
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'buket masih ada , pastikan sudah habis');
            return redirect()->to(base_url('Buket'));
            die($e->getMessage());
        }
    }
}
