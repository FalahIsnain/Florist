<?php

namespace App\Modules\Auth\Controllers;


use App\Modules\Auth\Models\userModel;

class Login extends BaseController
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
            'title' => 'Login',

        ];

        return view('App\Modules\Auth\Views\login_v', $data);
    }

    public function auth()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = sha1($this->request->getVar('password'));
        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['password']; //password di database
            if ($pass == $password) {
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'username'     => $data['username'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE,
                    'role' => $data['role'],
                ];
                $session->set($ses_data);

                if ($data['role'] == 'admin') {
                    return redirect()->to('Florist/');
                }
                return redirect()->to('Pages/home');
            } else {
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('Login')->withInput();
            }
        } else {
            $session->setFlashdata('msg', 'Email Tidak di temukan ');
            return redirect()->to('Login')->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Login/');
    }
}
