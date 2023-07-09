<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\GuruStaffRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\GuruStaffService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class GuruStaffController
{
    private GuruStaffService $guruStaffService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $guruStaffRepository = new GuruStaffRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->guruStaffService = new GuruStaffService($guruStaffRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showGuruStaff($title = null, $message = null, $error = null): void
    {
        $admin = $this->sessionService->findSession();
        $guruStaffList = $this->guruStaffService->getAllGuruStaff();

        View::render('Admin/Sekolah/guru-staff', [
            'title' => 'Daftar Guru & Staff',
            'model' => [
                'admin' => [
                    'username' => $admin->getUsername()
                ],
                'guruStaffList' => $guruStaffList,
                'message' => [
                    'title' => $title,
                    'description' => $message,
                    'error' => $error
                ]
            ]
        ]);
    }

    public function tambahGuruStaff(): void
    {
        $request = new GuruStaffRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaGuru = $_POST['namaGuru'];
            $request->jabatan = $_POST['jabatan'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->guruStaffService->createGuruStaff($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showGuruStaff($title, $message, $error);
    }

    public function editGuruStaff(string $id): void
    {
        $request = new GuruStaffRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaGuru = $_POST['namaGuru'];
            $request->jabatan = $_POST['jabatan'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->guruStaffService->updateGuruStaff($id, $request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda edit berhasil disimpan';
                }

                View::redirect('/admin/sekolah/guru-staff');
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showGuruStaff($title, $message, $error);
    }

    public function deleteGuruStaff(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;
        try {
            if ($this->guruStaffService->deleteGuruStaff($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }

        $this->showGuruStaff($title, $message, $error);
    }
}
