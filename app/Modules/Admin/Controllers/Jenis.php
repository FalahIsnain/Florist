<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\jenisModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class Jenis extends BaseController
{
    protected $jenisModel;
    public function __construct()
    {
        $this->jenisModel = new jenisModel();
    }
    public function index()
    {
        Helper(['form', 'url']);
        $data = [
            'title' => 'Data Jenis',
            'jenis' => $this->jenisModel->paginate(4, 'jenis'),
            'pager' => $this->jenisModel->pager,
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\jenis\indexJenis', $data);
    }

    public function addJenis()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'jenis_bunga' => [
                'rules' => 'required|is_unique[jenis.jenis_bunga]',
                'errors' => [
                    'required' => 'nama jenis harus diisi',
                    'is_unique'    => 'nama jenis sudah ada'
                ]
            ]
        ])) {
            return redirect()->to(base_url('Jenis'))->withInput();
        }

        $dataJenis = [
            'jenis_bunga' => $this->request->getPost('jenis_bunga')
        ];
        $this->jenisModel->save($dataJenis);
        session()->setFlashdata('pesan', 'data berhasil di save');
        return redirect()->to(base_url('Jenis'));
    }


    public function delJenis($id_jenis)
    {
        try {
            $this->jenisModel->delete($id_jenis);
            session()->setFlashdata('pesan', 'data berhasil di hapus');
            return redirect()->to(base_url('Jenis'));
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'jenis masih ada, pastikan sudah habis');
            return redirect()->to(base_url('Jenis'));
            die($e->getMessage());
        }
    }
}
