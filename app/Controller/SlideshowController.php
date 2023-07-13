<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\SlideshowRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\SessionService;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class SlideshowController
{
    private SlideshowService $slideshowService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $slideshowRepository = new SlideshowRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->slideshowService = new SlideshowService($slideshowRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function tambahSlideshow(): void
    {
        $admin = $this->sessionService->findSession();
        $request = new SlideshowRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = $_POST['judul'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->slideshowService->createSlideshow($request)){
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang anda tambah berhasil disimpan';
                }
            } catch (ValidationException $exception) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        View::render('Admin/Slideshow/tambah', [
            'title' => 'Upload Slideshow',
            'message' => [
                'title' => $title,
                'description' => $message,
                'error' => $error
            ],
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ]
        ]);
    }

    public function deleteSlideshow(string $id): void
    {
        try {
            $this->slideshowService->deleteSlideshow($id);
            // Redirect ke halaman yang sesuai setelah penghapusan berhasil
            View::redirect('/admin');
        } catch (\Exception $e) {
            // Handle error jika terjadi kesalahan saat menghapus slideshow
            View::render('error', [
                'title' => 'Error',
                'error' => $e->getMessage()
            ]);
        }

    }

    public function editSlideshow(string $id): void
    {
        $admin = $this->sessionService->findSession();
        $request = new SlideshowRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = $_POST['judul'];
            $request->foto = $_FILES['foto'];

            try {
                if ($this->slideshowService->editSlideshow($id, $request)){
                    $title = 'Data Berhasil Tersimpan';
                    $message = 'Selamat data yang anda edit berhasil disimpan';
                }

                View::redirect('/admin');
            } catch (ValidationException $exception) {
                // Handle error jika terjadi kesalahan saat mengedit slideshow
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $exception->getMessage();
            }
        }

        try {
            $slideshow = $this->slideshowService->getSlideshowById($id);
        } catch (ValidationException $e) {
            View::render404();
            return;
        }

        View::render('Admin/Slideshow/edit', [
            'title' => 'Edit Slideshow',
            'error' => $error,
            'slideshow' => $slideshow,
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ],
            'message' => [
                'title' => $title,
                'description' => $message,
                'error' => $error
            ]
        ]);
    }
}
