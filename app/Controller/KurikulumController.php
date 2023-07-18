<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\KurikulumRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Repository\KurikulumRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\KetSekolahService;
use Rubygroup\WebProfileSekolah\Service\KurikulumService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class KurikulumController
{
    private KurikulumService $kurikulumService;
    private KetSekolahService $ketSekolahService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $kurikulumRepository = new KurikulumRepository($connection);
        $ketSekolahRepository = new KetSekolahRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->kurikulumService = new KurikulumService($kurikulumRepository);
        $this->ketSekolahService = new KetSekolahService($ketSekolahRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function showKurikulumPagination($title = null, $message = null, $error = null): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        $totalCount = count($this->kurikulumService->getAllKurikulum());
        $kurikulumList = $this->kurikulumService->getAllKurikulumPagination($page, $perPage);
        $kurikulum = $this->ketSekolahService->getKurikulum();
        $admin = $this->sessionService->findSession();
        if ($admin === null) {
            View::redirect('/admin/login');
        } else {
            View::render('Admin/Kurikulum/kurikulum', [
                'title' => 'Daftar Kurikulum',
                'kurikulumList' => $kurikulumList,
                'kurikulum' => [
                    'nama' => $kurikulum->getNamaKurikulum(),
                    'deskripsi' => $kurikulum->getDekripsiKurikulum(),
                ],
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

    public function tambahKurikulum(): void
    {
        $request = new KurikulumRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->kategori = $_POST['kategori'];
            $request->komponen = $_POST['komponen'];
            $request->subKomponen = $_POST['subKomponen'];

            try {
                if ($this->kurikulumService->createKurikulum($request)) {
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang Anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception){
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }
        $this->showKurikulumPagination($title, $message, $error);
    }

    public function editKurikulum(string $id): void
    {
        $request = new KurikulumRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->kategori = $_POST['kategori'];
            $request->komponen = $_POST['komponen'];
            $request->subKomponen = $_POST['subKomponen'];

            try {
                if ($this->kurikulumService->updateKurikulum($id, $request)) {
                    $title = 'Data Berhasil Diperbarui';
                    $message = 'Selamat data yang Anda ubah berhasil diperbarui';
                }
            } catch (ValidationException $exception){
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }
        $this->showKurikulumPagination($title, $message, $error);
    }

    public function deleteKurikulum(string $id): void
    {
        $title = null;
        $message = null;
        $error = null;

        try {
            if ($this->kurikulumService->deleteKurikulum($id)) {
                $title = 'Data Berhasil Terhapus';
                $message = 'Selamat data Anda berhasil dihapus';
            }
        } catch (ValidationException $exception) {
            $title = 'Data Gagal Tersimpan';
            $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
            $error = $exception->getMessage();
        }

        $this->showKurikulumPagination($title, $message, $error);
    }

    public function editKurikulum2():void
    {
        $admin = $this->sessionService->findSession();
        $kurikulum = $this->ketSekolahService->getKurikulum();
        $title = null;
        $message = null;
        $error = null;

        if ($admin === null){
            View::redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kurikulum->setNamaKurikulum($_POST['nama']);
            $kurikulum->setDekripsiKurikulum($_POST['deskripsi']);
            try {
                $this->ketSekolahService->updateKurikulum($kurikulum);
                $title = 'Data Berhasil Tersimpan';
                $message = 'Selamat data sekolah berhasil diperbarui';
            }catch (ValidationException $exception){
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        $this->showKurikulumPagination($title, $message, $error);
    }
}