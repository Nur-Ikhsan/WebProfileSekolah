<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\AdminRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\AdminService;
use Rubygroup\WebProfileSekolah\Service\GuruStaffService;
use Rubygroup\WebProfileSekolah\Service\SessionService;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class AdminController
{
    private AdminService $adminService;
    private SessionService $sessionService;
    private SlideshowService $slideshowService;
    private GuruStaffService $guruStaffService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($adminRepository);
        $slideshowRepository = new SlideshowRepository($connection);
        $this->slideshowService = new SlideshowService($slideshowRepository);
        $this->guruStaffService = new GuruStaffService(new GuruStaffRepository($connection));

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function index(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        // Menghitung total jumlah slideshow
        $totalCount = count($this->slideshowService->getAllSlideshows());
        $slideshows = $this->slideshowService->getAllSlideshowsPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/index', [
                'title' => 'Dashboard Admin',
                'slideshows' => $slideshows,
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalCount' => $totalCount,
                    'totalPages' => ceil($totalCount / $perPage)
                ]
            ]);
        }
    }


    public function register(): void
    {
        $admin = $this->sessionService->findSession();
        $guruStaff = $this->guruStaffService->getAllGuruStaff();
        $request = new AdminRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];
            $guruStaff = $this->guruStaffService->getGuruStaffById($_POST['id_guru_staff']);
            $request->guruStaff = $guruStaff;

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
            'error' => $error,
            'guruStaff' => $guruStaff
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
        $error = null;

        if ($admin === null) {
            View::redirect('/admin/login');
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmNewPassword = $_POST['confirmNewPassword'];

            try {
                $this->adminService->gantiPassword($admin->getUsername(), $oldPassword, $newPassword, $confirmNewPassword);
                View::redirect('/admin');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        View::render('Admin/ganti-password', [
            'title' => 'Ganti Password',
            'error' => $error,
            'admin' => [
                'username' => $admin->getUsername()
            ],
        ]);
    }
}