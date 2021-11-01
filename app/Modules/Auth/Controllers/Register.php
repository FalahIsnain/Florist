<?php

namespace App\Modules\Auth\Controllers;


use App\Modules\Auth\Models\userModel;

class Register extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        helper(['form', 'url']);

        $data = [
            'title' => 'daftar',
            'validation' => \Config\Services::validation(),
        ];

        return view('App\Modules\Auth\Views\regist_v', $data);
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
            'confPass' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches'    => 'password tidak sama',
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
            $data['title'] = 'Daftar';
            return redirect()->to(base_url('Register'))->withInput();
        } else {
            $data = [
                'username'     => $this->request->getVar('username'),
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'password' => sha1($this->request->getVar('password')),
            ];
            $this->userModel->save($data);
            session()->setFlashdata('pesan', 'Akun berhasil di buat, silahkan Login');
            return redirect()->to('Login/');
        }
    }
}
