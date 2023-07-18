<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\GaleriRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\GaleriRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\GaleriService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class GaleriController
{
    private GaleriService $galeriService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $GaleriRepository = new GaleriRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->galeriService = new GaleriService($GaleriRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showGaleriPagination($title = null, $message = null, $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;

        $totalCount = count($this->galeriService->getAllGaleri());
        $galeriList = $this->galeriService->getAllGaleriPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Galeri/galeri', [
                'title' => 'Daftar Galeri',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'galeriList' => $galeriList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ],
                'message' => [
                    'title' => $title,
                    'description' => $message,
                    'error' => $error
                ]
            ]);
        }
    }

    public function tambahGaleri(): void
    {
        $request = new GaleriRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judulGaleri = $_POST['judul'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->galeriService->createGaleri($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showGaleriPagination($title, $message, $error);
    }

    public function editGaleri(string $id): void
    {
        $request = new GaleriRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judulGaleri = $_POST['judul'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->galeriService->updateGaleri($id, $request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showGaleriPagination($title, $message, $error);
    }

    public function deleteGaleri(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;
        try {
            if ($this->galeriService->deleteGaleri($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }
        $this->showGaleriPagination($title, $message, $error);
    }
}