<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\AdminRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\AdminService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class AdminController
{
    private AdminService $adminService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($adminRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function index(): void
    {
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/index', [
                'title' => 'Dashboard Admin',
                'admin' => [
                    'username' => $admin->getUsername()
                ]
            ]);
        }
    }

    public function register(): void
    {
        $admin = $this->sessionService->findSession();
        $request = new AdminRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];

            try {
                $this->adminService->register($request);
                View::redirect('/admin/login');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        if ($admin !== null) {
            View::redirect('/admin/index');
        }

        View::render('Admin/register', [
            'title' => 'Register Admin',
            'error' => $error
        ]);
    }

    public function login(): void
    {
        $admin = $this->sessionService->findSession();
        $request = new AdminRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];

            try {
                $adminResponse = $this->adminService->login($request);
                $this->sessionService->createSession($adminResponse->id);
                View::redirect('/admin');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        if ($admin !== null) {
            View::redirect('/admin');
        }

        View::render('Admin/login', [
            'title' => 'Login Admin',
            'error' => $error
        ]);
    }

    public function logout(): void
    {
        $this->sessionService->deleteSession();
        View::redirect('/admin/login');
    }

    public function editProfile(): void
    {
        $admin = $this->sessionService->findSession();
        $request = new AdminRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];

            try {
                $this->adminService->updateProfile($request, $admin->getId());
                View::redirect('/admin/profile');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        if ($admin === null) {
            View::redirect('/admin/login');
        }


        View::render('Admin/updateProfile', [
            'title' => 'Update Profile Admin',
            'admin' => [
                'username' => $admin->getUsername()
            ],
            'error' => $error
        ]);

    }

    public function changePassword(): void
    {
        $admin = $this->sessionService->findSession();
        $request = new AdminRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->password = $_POST['password'];
            $request->newPassword = $_POST['newPassword'];
            $request->confirmNewPassword = $_POST['confirmNewPassword'];

            try {
                $this->adminService->changePassword($request, $admin->getId());
                View::redirect('/admin/profile');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        if ($admin === null) {
            View::redirect('/admin/login');
        }


        View::render('Admin/changePassword', [
            'title' => 'Change Password Admin',
            'admin' => [
                'username' => $admin->getUsername()
            ],
            'error' => $error
        ]);

    }
}