<?php

namespace Rubygroup\WebProfileSekolah\Service;


use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Slideshow;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\SlideshowRequest;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class SlideshowService
{
    private SlideshowRepository $slideshowRepository;
    private ValidationUtil $validationUtil;

    public function __construct(SlideshowRepository $slideshowRepository)
    {
        $this->slideshowRepository = $slideshowRepository;
        $this->validationUtil = new ValidationUtil();
    }

    public function createSlideshow(SlideshowRequest $request): Slideshow
    {
        $this->validationUtil->validateImageFile($request->foto);

        $slideshow = new Slideshow();
        $slideshow->setId(Uuid::uuid4()->toString());
        $slideshow->setJudul($request->judul);
        $slideshow->setFoto($this->uploadPhoto($request->foto));

        return $this->slideshowRepository->saveSlideshow($slideshow);
    }

    public function getAllSlideshowsPagination(int $page, int $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->slideshowRepository->getAllSlideshowsPagination($perPage, $offset);
    }

    public function getAllSlideshows(): array
    {
        return $this->slideshowRepository->getAllSlideshows();
    }


    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/slideshow/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function deleteSlideshow(string $id): void
    {
        // Menghapus data slideshow dari database
        $slideshow = $this->slideshowRepository->findSlideshowById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');

        }
        $this->slideshowRepository->deleteSlideshow($slideshow);

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public function editSlideshow(string $id, SlideshowRequest $request): Slideshow
    {


        $slideshow = $this->slideshowRepository->findSlideshowById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');
        }

        if (!empty($request->foto['name'])){
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $slideshow->setFoto($this->uploadPhoto($request->foto));
        }
        $this->validationUtil->validate($request->judul, 'Judul');
        $slideshow->setJudul($request->judul);

        return $this->slideshowRepository->updateSlideshow($slideshow);
    }

    // find slideshow by id
    public function getSlideshowById(string $id): Slideshow
    {
        $slideshow = $this->slideshowRepository->findSlideshowById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');
        }

        return $slideshow;
    }
}
