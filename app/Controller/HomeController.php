<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;

class HomeController
{

    function index(): void
    {
        View::render('index');
    }

    function hello(): void
    {
        echo 'HomeController.hello()';
    }

    function world(): void
    {
        echo 'HomeController.world()';
    }

    function about(): void
    {
        echo 'HomeController.about()';
    }

    function login(): void
    {
        $request = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $user = $this->userModel->getByUsername($request['username']);

        $response = [
            'status' => 'success',
            'message' => 'Login berhasil'
        ];
    }

}