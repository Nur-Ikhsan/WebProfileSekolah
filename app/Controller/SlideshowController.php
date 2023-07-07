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

    public function uploadSlideshow(): void
    {
        $request = new SlideshowRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = $_POST['judul'];
            $request->foto = $_FILES['foto'];

            try {
                $slideshowResponse = $this->slideshowService->createSlideshow($request);

                View::redirect('/admin');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        View::render('Admin/Slideshow/upload', [
            'title' => 'Upload Slideshow',
            'error' => $error
        ]);
    }

    public function viewAllSlideshows(): void
    {
        $slideshows = $this->slideshowService->getAllSlideshows();

        View::render('Admin/Slideshow/viewAll', [
            'title' => 'All Slideshows',
            'slideshows' => $slideshows
        ]);
    }

    public function delete(string $id): void
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

    public function edit(string $id): void
    {
        $admin = $this->sessionService->findSession();
        $request = new SlideshowRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = $_POST['judul'];
            $request->foto = $_FILES['foto'];

            try {
                $this->slideshowService->updateSlideshow($id, $request);

                View::redirect('/admin');
            } catch (\Exception $e) {
                // Handle error jika terjadi kesalahan saat mengedit slideshow
                View::render('error', [
                    'title' => 'Error',
                    'message' => $e->getMessage(),
                    'admin' => [
                        'username' => $admin->getUsername()
                    ]
                ]);
            }
        }

        $slideshow = $this->slideshowService->getSlideshowById($id);

        View::render('Admin/Slideshow/edit', [
            'title' => 'Edit Slideshow',
            'error' => $error,
            'slideshow' => $slideshow,
            'admin' => [
                'username' => $admin->getUsername()
            ]
        ]);
    }
}
