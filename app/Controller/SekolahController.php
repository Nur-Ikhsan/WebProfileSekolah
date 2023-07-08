<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Sekolah;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\SekolahRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Repository\SekolahRepository;
use Rubygroup\WebProfileSekolah\Service\SessionService;
use Rubygroup\WebProfileSekolah\Service\SekolahService;

class SekolahController
{
    private SekolahService $sekolahService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sekolahRepository = new SekolahRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->sekolahService = new SekolahService($sekolahRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function tentang(): void
    {
        $admin = $this->sessionService->findSession();
        $sekolah = $this->sekolahService->getSekolah();

        View::render('Admin/Sekolah/tentang', [
            'title' => 'Tentang Sekolah',
            'sekolah' => $sekolah,
            'admin' => [
                'username' => $admin->getUsername()
            ]
        ]);
    }

    public function editSekolah(): void
    {
        $admin = $this->sessionService->findSession();
        $sekolah = $this->sekolahService->getSekolah();
        $request = new SekolahRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->nama = $_POST['nama'];
            $request->alamat = $_POST['alamat'];
            $request->telepon = $_POST['telepon'];
            $request->email = $_POST['email'];
            $request->website = $_POST['website'];
            $request->judulPengantar = $_POST['judul_pengantar'];
            $request->deskripsi = $_POST['deskripsi'];

            $sekolah->setNama($request->nama);
            $sekolah->setAlamat($request->alamat);
            $sekolah->setTelepon($request->telepon);
            $sekolah->setEmail($request->email);
            $sekolah->setWebsite($request->website);
            $sekolah->setJudulPengantar($request->judulPengantar);
            $sekolah->setDeskripsi($request->deskripsi);

            try {
                $this->sekolahService->editSekolah($sekolah);
                $title = 'Data Berhasil Tersimpan';
                $message = 'Selamat data sekolah berhasil diperbarui';
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        View::render('Admin/Sekolah/edit', [
            'title' => 'Edit Sekolah',
            'sekolah' => $sekolah,
            'error' => $error,
            'admin' => [
                'username' => $admin->getUsername()
            ],
            'message' => [
                'title' => $title,
                'description' => $message,
                'error' => $error
            ]
        ]);
    }
}
