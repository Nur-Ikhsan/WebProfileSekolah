<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\SlideshowRequest;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class SlideshowController
{
    private SlideshowService $slideshowService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $slideshowRepository = new SlideshowRepository($connection);
        $this->slideshowService = new SlideshowService($slideshowRepository);
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

                View::redirect('/slideshow');
            } catch (ValidationException $exception) {
                $error = $exception->getMessage();
            }
        }

        View::render('Slideshow/upload', [
            'title' => 'Upload Slideshow',
            'error' => $error
        ]);
    }

    public function viewAllSlideshows(): void
    {
        $slideshows = $this->slideshowService->getAllSlideshows();

        View::render('Slideshow/viewAll', [
            'title' => 'All Slideshows',
            'slideshows' => $slideshows
        ]);
    }

    public function delete(string $id): void
    {
        try {
            $this->slideshowService->deleteSlideshow($id);
            // Redirect ke halaman yang sesuai setelah penghapusan berhasil
            View::redirect('/slideshow');
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
        $request = new SlideshowRequest();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = $_POST['judul'];
            $request->foto = $_FILES['foto'];

            try {
                $slideshowResponse = $this->slideshowService->updateSlideshow($id, $request);

                View::redirect('/slideshow');
            } catch (\Exception $e) {
                // Handle error jika terjadi kesalahan saat mengedit slideshow
                View::render('error', [
                    'title' => 'Error',
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $slideshow = $this->slideshowService->getSlideshowById($id);

        View::render('Slideshow/edit', [
            'title' => 'Edit Slideshow',
            'error' => $error,
            'slideshow' => $slideshow
        ]);
    }
}
