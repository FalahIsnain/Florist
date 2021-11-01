<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\floristModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class Pages extends BaseController
{
    public function home()
    {
        helper(['form', 'url']);
        $floristModel = new floristModel();
        $data = [
            'title' => 'Home',
            'florist' => $floristModel->getBunga()
        ];

        return view('App\Modules\User\Views\home', $data);
    }

    public function about()
    {
        helper(['form', 'url']);
        $data = [
            'title' => 'About me'
        ];
        return view('App\Modules\User\Views\about', $data);
    }

    public function contact()
    {
        helper(['form', 'url']);
        $data = [
            'title' => "contact Us"

        ];
        return view('App\Modules\User\Views\contact', $data);
    }
}
