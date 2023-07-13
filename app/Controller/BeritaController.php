<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\BeritaRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\BeritaService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class BeritaController
{
    private BeritaService $beritaService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $beritaRepository = new BeritaRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->beritaService = new BeritaService($beritaRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showBeritaPagination($title = null, $message = null, $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;

        $totalCount = count($this->beritaService->getAllBerita());
        $beritaList = $this->beritaService->getAllBeritaPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Berita/berita', [
                'title' => 'Daftar Berita',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'beritaList' => $beritaList,
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

    public function tambahBerita(): void
    {
        $request = new BeritaRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judulBerita = $_POST['judulBerita'];
            $request->isiBerita = $_POST['isiBerita'];
            $request->tanggal = $_POST['tanggal'];
            $request->foto = $_FILES['foto'] ;
            try {
                if ($this->beritaService->createBerita($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showBeritaPagination($title, $message, $error);
    }

    public function editBerita(string $id): void
    {
        $request = new BeritaRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judulBerita = $_POST['judulBerita'];
            $request->isiBerita = $_POST['isiBerita'];
            $request->tanggal = $_POST['tanggal'];
            $request->foto = $_FILES['foto'] ;
            try {
                if ($this->beritaService->updateBerita($id, $request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showBeritaPagination($title, $message, $error);
    }

    public function deleteBerita(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;
        try {
            if ($this->beritaService->deleteBerita($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }
        $this->showBeritaPagination($title, $message, $error);
    }
}