<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Galeri;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\GaleriRequest;
use Rubygroup\WebProfileSekolah\Repository\GaleriRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class GaleriService
{
    private GaleriRepository $galeriRepository;
    private ValidationUtil $validationUtil;

    public function __construct(GaleriRepository $galeriRepository)
    {
        $this->galeriRepository = $galeriRepository;
        $this->validationUtil = new ValidationUtil();
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/galeri/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function createGaleri(GaleriRequest $request): Galeri
    {
        $this->validationUtil->validateImageFile($request->foto);

        $galeri = new Galeri();
        $galeri->setIdGaleri(Uuid::uuid4()->toString());
        $galeri->setJudulGaleri($request->judulGaleri);
        $galeri->setDeskripsi($request->deskripsi);
        $galeri->setFoto($this->uploadPhoto($request->foto));

        return $this->galeriRepository->saveGaleri($galeri);
    }

    public function getGaleriById(string $id): Galeri
    {
        $galeri = $this->galeriRepository->findGaleriById($id);
        if ($galeri === null) {
            throw new ValidationException('Galeri tidak ditemukan.');
        }

        return $galeri;
    }

    public function updateGaleri(string $id, GaleriRequest $request): Galeri
    {


        $galeri = $this->galeriRepository->findGaleriById($id);
        if ($galeri === null) {
            throw new ValidationException('Galeri tidak ditemukan.');
        }

        if (!empty($request->foto['name'])){
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/galeri/' . $galeri->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $galeri->setFoto($this->uploadPhoto($request->foto));
        }
        $galeri->setJudulGaleri($request->judulGaleri);
        $galeri->setDeskripsi($request->deskripsi);

        return $this->galeriRepository->updateGaleri($galeri);
    }

    public function deleteGaleri(string $id): bool
    {
        $galeri = $this->galeriRepository->findGaleriById($id);
        if ($galeri === null) {
            throw new ValidationException('Galeri tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/galeri/' . $galeri->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->galeriRepository->deleteGaleri($galeri);
    }

    public function getAllGaleri(): array
    {
        return $this->galeriRepository->getAllGaleri();
    }

    public function getAllGaleriPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->galeriRepository->getAllGaleriPagination($perPage, $offset);
    }


    public function galeriSearch($search): array
    {
        return $this->galeriRepository->galeriSearch($search);
    }

    // search
    public function getAllGaleriSearch($page, $perPage, $search): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->galeriRepository->getAllGaleriSearch($perPage, $offset, $search);
    }
}