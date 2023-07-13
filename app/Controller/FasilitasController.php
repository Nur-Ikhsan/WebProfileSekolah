<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\FasilitasRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\FasilitasRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\FasilitasService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class FasilitasController
{
    private FasilitasService $fasilitasService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $fasilitasRepository = new FasilitasRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->fasilitasService = new FasilitasService($fasilitasRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function ShowFasilitasPagination($title = null,
                                            $message = null,
                                            $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        // Menghitung total jumlah slideshow
        $totalCount = count($this->fasilitasService->getAllFasilitas());
        $fasilitasList = $this->fasilitasService->getAllFasilitasPagination($page, $perPage);
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Sekolah/fasilitas', [
                'title' => 'Daftar Fasilitas',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'fasilitasList' => $fasilitasList,
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

    public function tambahFasilitas(): void
    {
        $request = new FasilitasRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->nama = $_POST['nama'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->fasilitasService->createFasilitas($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->ShowFasilitasPagination($title, $message, $error);
    }

    public function editFasilitas(string $id): void
    {
        $request = new FasilitasRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->nama = $_POST['nama'];
            $request->deskripsi = $_POST['deskripsi'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->fasilitasService->updateFasilitas($id, $request)) {
                    $title = 'Data Berhasil Diperbarui';
                    $message = 'Selamat data yang Anda ubah berhasil diperbarui';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->ShowFasilitasPagination($title, $message, $error);
    }

    public function deleteFasilitas(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;
        try {
            if ($this->fasilitasService->deleteFasilitas($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }

        $this->ShowFasilitasPagination($title, $message, $error);
    }
}
