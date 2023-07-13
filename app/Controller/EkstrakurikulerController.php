<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\EkstrakurikulerRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\EkstrakurikulerRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\EkstrakurikulerService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class EkstrakurikulerController
{
    private EkstrakurikulerService $ekstrakurikulerService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $ekstrakurikulerRepository = new EkstrakurikulerRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->ekstrakurikulerService = new EkstrakurikulerService($ekstrakurikulerRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showEkstrakurikulerPagination($title = null,
                                                  $message = null,
                                                  $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        // Menghitung total jumlah slideshow
        $totalCount = count($this->ekstrakurikulerService->getAllEkstrakurikuler());
        $ekstrakurikulerList = $this->ekstrakurikulerService->getAllEkstrakurikulerPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Sekolah/ekstrakurikuler', [
                'title' => 'Daftar Ekstrakurikuler',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'ekstrakurikulerList' => $ekstrakurikulerList,
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

    public function tambahEkstrakurikuler(): void
    {
        $request = new EkstrakurikulerRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaEkstrakurikuler = $_POST['nama'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->icon = $_FILES['icon'];

            try {
                if ($this->ekstrakurikulerService->createEkstrakurikuler($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $e) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $e->getMessage();
            }
        }

        $this->showEkstrakurikulerPagination($title, $message, $error);
    }

    public function editEkstrakurikuler(string $id): void
    {
        $request = new EkstrakurikulerRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaEkstrakurikuler = $_POST['nama'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->icon = $_FILES['icon'];

            try {
                if ($this->ekstrakurikulerService->updateEkstrakurikuler($id, $request)) {
                    $title = 'Data Berhasil Diperbarui';
                    $message = 'Selamat data yang Anda ubah berhasil diperbarui';
                }
            }catch (ValidationException $exception){
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }
        $this->showEkstrakurikulerPagination($title, $message, $error);
    }

    public function deleteEkstrakurikuler(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;

        try {
            if ($this->ekstrakurikulerService->deleteEkstrakurikuler($id)) {
                $title = 'Data Berhasil Dihapus';
                $message = 'Selamat data yang Anda pilih berhasil dihapus';
            }
        } catch (ValidationException $e) {
            $title = 'Data Gagal Dihapus';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $e->getMessage();
        }

        $this->showEkstrakurikulerPagination($title, $message, $error);
    }
}