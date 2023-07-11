<?php

namespace Rubygroup\WebProfileSekolah\Service;


use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Slideshow;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\SlideshowRequest;
use Rubygroup\WebProfileSekolah\Model\SlideshowResponse;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;

class SlideshowService
{
    private SlideshowRepository $slideshowRepository;

    public function __construct(SlideshowRepository $slideshowRepository)
    {
        $this->slideshowRepository = $slideshowRepository;
    }

    private function validateImageFile(array $file): void
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        $fileName = $file['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (empty($fileName)) {
            throw new ValidationException('Tidak ada perubahan, File gambar tidak boleh kosong.');
        }

        if ($file['size'] > 1000000) {
            throw new ValidationException('Ukuran file gambar tidak boleh lebih dari 1MB.');
        }

        if ($file['error'] !== 0) {
            throw new ValidationException('File gambar tidak valid.');
        }

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new ValidationException('File gambar tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.');
        }
    }

    public function createSlideshow(SlideshowRequest $request): SlideshowResponse
    {
        $this->validateImageFile($request->foto);

        $slideshow = new Slideshow();
        $slideshow->setId(Uuid::uuid4()->toString());
        $slideshow->setJudul($request->judul);
        $slideshow->setFoto($this->uploadPhoto($request->foto));

        $savedSlideshow = $this->slideshowRepository->save($slideshow);

        return new SlideshowResponse($savedSlideshow);
    }

    public function getAllSlideshowsPagination(int $page, int $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->slideshowRepository->getAllPagination($perPage, $offset);
    }

    public function getAllSlideshows(): array
    {
        return $this->slideshowRepository->getAll();
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
        $slideshow = $this->slideshowRepository->findById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');

        }
        $this->slideshowRepository->delete($slideshow);

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public function editSlideshow(string $id, SlideshowRequest $request): SlideshowResponse
    {
        $this->validateImageFile($request->foto);

        $slideshow = $this->slideshowRepository->findById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $slideshow->setJudul($request->judul);
        if ($request->foto !== null) {
            $this->validateImageFile($request->foto);
            $slideshow->setFoto($this->uploadPhoto($request->foto));
        }

        $updatedSlideshow = $this->slideshowRepository->update($slideshow);

        return new SlideshowResponse($updatedSlideshow);
    }

    // find slideshow by id
    public function getSlideshowById(string $id): Slideshow
    {
        $slideshow = $this->slideshowRepository->findById($id);
        if ($slideshow === null) {
            throw new ValidationException('Not Found');
        }

        return $slideshow;
    }
}
