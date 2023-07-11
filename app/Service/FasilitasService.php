<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Fasilitas;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\FasilitasRequest;
use Rubygroup\WebProfileSekolah\Model\FasilitasResponse;
use Rubygroup\WebProfileSekolah\Repository\FasilitasRepository;

class FasilitasService
{
    private FasilitasRepository $fasilitasRepository;

    public function __construct(FasilitasRepository $fasilitasRepository)
    {
        $this->fasilitasRepository = $fasilitasRepository;
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

    public function createFasilitas(FasilitasRequest $request): FasilitasResponse
    {
        $this->validateImageFile($request->foto);

        $fasilitas = new Fasilitas();
        $fasilitas->setId(Uuid::uuid4()->toString());
        $fasilitas->setNama($request->nama);
        $fasilitas->setDeskripsi($request->deskripsi);
        $fasilitas->setFoto($this->uploadPhoto($request->foto));

        $savedFasilitas = $this->fasilitasRepository->save($fasilitas);

        return new FasilitasResponse($savedFasilitas);
    }

    public function getFasilitasById(string $id): Fasilitas
    {
        $fasilitas = $this->fasilitasRepository->findById($id);
        if ($fasilitas === null) {
            throw new ValidationException('Fasilitas tidak ditemukan.');
        }

        return $fasilitas;
    }

    public function updateFasilitas(string $id, FasilitasRequest $request): FasilitasResponse
    {
        $this->validateImageFile($request->foto);

        $fasilitas = $this->fasilitasRepository->findById($id);
        if ($fasilitas === null) {
            throw new ValidationException('Fasilitas tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/fasilitas/' . $fasilitas->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $fasilitas->setNama($request->nama);
        $fasilitas->setDeskripsi($request->deskripsi);
        if ($request->foto !== null) {
            $this->validateImageFile($request->foto);
            $fasilitas->setFoto($this->uploadPhoto($request->foto));
        }

        $updatedFasilitas = $this->fasilitasRepository->update($fasilitas);

        return new FasilitasResponse($updatedFasilitas);
    }

    public function deleteFasilitas(string $id): bool
    {
        $fasilitas = $this->fasilitasRepository->findById($id);
        if ($fasilitas === null) {
            throw new ValidationException('Fasilitas tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/fasilitas/' . $fasilitas->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->fasilitasRepository->delete($fasilitas);
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/fasilitas/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getAllFasilitas()
    {
        return $this->fasilitasRepository->getAll();
    }
}
