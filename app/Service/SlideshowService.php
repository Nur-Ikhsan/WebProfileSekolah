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

    public function createSlideshow(SlideshowRequest $request): SlideshowResponse
    {

        $slideshow = new Slideshow();
        $slideshow->setId(Uuid::uuid4()->toString());
        $slideshow->setJudul($request->judul);
        $slideshow->setFoto($this->uploadPhoto($request->foto));

        $savedSlideshow = $this->slideshowRepository->save($slideshow);

        return new SlideshowResponse($savedSlideshow);
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
            throw new \Exception('Slideshow not found');
        }
        $this->slideshowRepository->delete($slideshow);

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public function updateSlideshow(string $id, SlideshowRequest $request): SlideshowResponse
    {
        $slideshow = $this->slideshowRepository->findById($id);
        if ($slideshow === null) {
            throw new \Exception('Slideshow not found');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/slideshow/' . $slideshow->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $slideshow->setJudul($request->judul);
        if ($request->foto !== null) {
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
            throw new \Exception('Slideshow not found');
        }

        return $slideshow;
    }
}
