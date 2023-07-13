<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use DateTime;
use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\PrestasiRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\PrestasiRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\PrestasiService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class PrestasiController
{
    private PrestasiService $prestasiService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $prestasiRepository = new PrestasiRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->prestasiService = new PrestasiService($prestasiRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showPrestasiPagination($title = null, $message = null, $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        $totalCount = count($this->prestasiService->getAllPrestasi());
        $prestasiList = $this->prestasiService->getAllPrestasiPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Sekolah/prestasi', [
                'title' => 'Daftar Prestasi',
                'prestasiList' => $prestasiList,
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

    public function tambahPrestasi(): void
    {
        $request = new PrestasiRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->tanggal = $_POST['tanggal'];
            $request->kategori = $_POST['kategori'];
            $request->nama = $_POST['namaPrestasi'];

            try {
                if ($this->prestasiService->createPrestasi($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showPrestasiPagination($title, $message, $error);
    }

    public function editPrestasi(string $id): void
    {
        $request = new PrestasiRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->tanggal = $_POST['tanggal'];
            $request->kategori = $_POST['kategori'];
            $request->nama = $_POST['namaPrestasi'];

            try {
                if ($this->prestasiService->updatePrestasi($id, $request)) {
                    $title = 'Data Berhasil Diperbarui';
                    $message = 'Selamat data yang Anda ubah berhasil diperbarui';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showPrestasiPagination($title, $message, $error);
    }

    public function deletePrestasi(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;

        try {
            if ($this->prestasiService->deletePrestasi($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }

        $this->showPrestasiPagination($title, $message, $error);
    }
}
