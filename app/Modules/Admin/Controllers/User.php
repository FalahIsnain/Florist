<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\userModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index()
    {
        helper(['form', 'url']);
        $currPage = $this->request->getVar('page_bunga') ? $this->request->getVar('page_bunga') : 1;
        $data = [
            'title' => 'Data pelanggan',
            'user' => $this->userModel->paginate(4, 'pengguna'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currPage
        ];
        return view('App\Modules\Admin\Views\users\indexUser', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
        $data = [
            'title' => 'tambah data Pengguna',
            'validation' => \Config\Services::validation(),

        ];
        return view('App\Modules\Admin\Views\users\create', $data);
    }

    public function save()
    {
        helper(['form']);

        $validation = $this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'nama harus diisi',
                    'min_length'    => 'nama harus memiliki minimal 3 karakter'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'nama harus diisi',
                    'min_length'    => 'username harus memiliki minimal 3 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[200]',
                'errors' => [
                    'required' => 'password harus diisi',
                    'min_length'    => 'password harus memiliki minimal 6 karakter'
                ]

            ],
            'email' => [
                'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[pengguna.email]',
                'errors' => [
                    'required'    => 'email harus di isi',
                    'min_length'    => 'email harus memiliki minimal 6 karakter',
                    'is_unique'    => 'email sudah terdaftar'



                ]
            ]

        ]);

        if (!$validation) {
            $data['validation'] = $this->validator;
            $data['title'] = 'Tambah Pengguna';
            return redirect()->to(base_url('User/create'))->withInput();
        } else {
            $data = [
                'username'     => $this->request->getVar('username'),
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'password' => sha1($this->request->getVar('password'))
            ];
            $this->userModel->save($data);
            session()->setFlashdata('pesan', 'Akun berhasil di save');
            return redirect()->to('User/');
        }
    }


    public function delete($id_user)
    {

        helper(['form', 'url']);
        $role = $this->userModel->getOne($id_user);
        if ($role['role'] == 'admin') {
            session()->setFlashdata('pesan', 'Orang yang dihapus adalah admin');
            return redirect()->to(base_url('User'));
        }
        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('User'));
    }


    public function edit()
    {
        helper(['form', 'url']);
        $id_user = $this->request->uri->getSegment(3);
        $jumlahRecord = $this->userModel->where('id_user', $id_user)->countAllResults();

        if ($jumlahRecord == 1) {

            $dataEdit = [
                'dataEdit' => $this->userModel->getOne($id_user),
                'title' => "form update data",
                'validation' => \Config\Services::validation(),
            ];
            return view('App\Modules\Admin\Views\users\edit', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'data tidak ada di database');
            return redirect()->to(base_url('Users'));
        }
    }


    public function update($id_user)
    {
        helper(['form', 'url']);
        $validation = $this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'nama harus diisi',
                    'min_length'    => 'nama harus memiliki minimal 3 karakter'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'nama harus diisi',
                    'min_length'    => 'username harus memiliki minimal 3 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[200]',
                'errors' => [
                    'required' => 'password harus diisi',
                    'min_length'    => 'password harus memiliki minimal 6 karakter'
                ]

            ],
            'email' => [
                'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[pengguna.email,id_user,'.$id_user.']',
                'errors' => [
                    'required'    => 'email harus di isi',
                    'min_length'    => 'email harus memiliki minimal 6 karakter',
                    'is_unique'    => 'email sudah terdaftar'
                ]
            ]

        ]);
        if (!$validation) {

            $dataEdit = [
                'dataEdit' => $this->userModel->getOne($id_user),
                'title' => "form update data",
                'validation' => \Config\Services::validation(),
            ];

            return view('App\Modules\Admin\Views\users\edit', $dataEdit);
        } else {

            $dataUpdate = [
                'username'     => $this->request->getVar('username'),
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'id_user' => $this->request->getVar('id_user'),
                'password' => sha1($this->request->getVar('password'))
            ];

            $jumlahRecord = $this->userModel->where('id_user', $dataUpdate['id_user'])->countAllResults();

            if ($jumlahRecord == 1) {
                $this->userModel->update($dataUpdate['id_user'], $dataUpdate);
            } else {
                session()->setFlashdata('pesan', 'data tidak ada di database');
                return redirect()->to(base_url('User'));
            }
            session()->setFlashdata('pesan', 'data berhasil di save');

            return redirect()->to(base_url('User'));;
        }
    }
}
