<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Kegiatan;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\KegiatanRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\KegiatanService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class KegiatanController
{
    private KegiatanService $kegiatanService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $kegiatanRepository = new KegiatanRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->kegiatanService = new kegiatanService($kegiatanRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showKegiatanPagination($title = null,
                                           $message = null,
                                           $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        // Menghitung total jumlah slideshow
        $totalCount = count($this->kegiatanService->getAllKegiatan());
        $kegiatanList = $this->kegiatanService->getAllKegiatanPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Sekolah/kegiatan', [
                'title' => 'Daftar Kegiatan',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'kegiatanList' => $kegiatanList,
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

    public function tambahKegiatan(): void
    {
        $request = new KegiatanRequest();
        $title = null;
        $message = null;
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaKegiatan = $_POST['nama_kegiatan'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];


            try {
                if ($this->kegiatanService->createKegiatan($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showKegiatanPagination($title, $message, $error);
    }

    public function editKegiatan(string $idKegiatan): void
    {
        $request = new KegiatanRequest();
        $title = null;
        $message = null;
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->namaKegiatan = $_POST['nama_kegiatan'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];


            try {
                if ($this->kegiatanService->updateKegiatan($idKegiatan, $request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda edit berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }

        }
        $this->showKegiatanPagination($title, $message, $error);
    }

    public function hapusKegiatan(string $idKegiatan)
    {
        $title = null;
        $message = null;
        $error = null;

        try {

            if ($this->kegiatanService->deleteKegiatan($idKegiatan)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }

        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }

        $this->showKegiatanPagination($title, $message, $error);
    }
}