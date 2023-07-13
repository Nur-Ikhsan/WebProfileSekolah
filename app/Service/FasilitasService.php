<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Fasilitas;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\FasilitasRequest;
use Rubygroup\WebProfileSekolah\Model\FasilitasResponse;
use Rubygroup\WebProfileSekolah\Repository\FasilitasRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class FasilitasService
{
    private FasilitasRepository $fasilitasRepository;
    private ValidationUtil $validationUtil;

    public function __construct(FasilitasRepository $fasilitasRepository)
    {
        $this->fasilitasRepository = $fasilitasRepository;
        $this->validationUtil = new ValidationUtil();
    }

    public function createFasilitas(FasilitasRequest $request): FasilitasResponse
    {
        $this->validationUtil->validateImageFile($request->foto);

        $fasilitas = new Fasilitas();
        $fasilitas->setId(Uuid::uuid4()->toString());
        $fasilitas->setNama($request->nama);
        $fasilitas->setDeskripsi($request->deskripsi);
        $fasilitas->setFoto($this->uploadPhoto($request->foto));

        $savedFasilitas = $this->fasilitasRepository->saveFasilitas($fasilitas);

        return new FasilitasResponse($savedFasilitas);
    }

    public function getFasilitasById(string $id): Fasilitas
    {
        $fasilitas = $this->fasilitasRepository->findFasilitasById($id);
        if ($fasilitas === null) {
            throw new ValidationException('Fasilitas tidak ditemukan.');
        }

        return $fasilitas;
    }

    public function updateFasilitas(string $id, FasilitasRequest $request): FasilitasResponse
    {
        $this->validationUtil->validateImageFile($request->foto);

        $fasilitas = $this->fasilitasRepository->findFasilitasById($id);
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
            $fasilitas->setFoto($this->uploadPhoto($request->foto));
        }

        $updatedFasilitas = $this->fasilitasRepository->updateFasilitas($fasilitas);

        return new FasilitasResponse($updatedFasilitas);
    }

    public function deleteFasilitas(string $id): bool
    {
        $fasilitas = $this->fasilitasRepository->findFasilitasById($id);
        if ($fasilitas === null) {
            throw new ValidationException('Fasilitas tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/fasilitas/' . $fasilitas->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->fasilitasRepository->deleteFasilitas($fasilitas);
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/fasilitas/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getAllFasilitas(): array
    {
        return $this->fasilitasRepository->getAllFasilitas();
    }

    public function getAllFasilitasPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->fasilitasRepository->getAllFasilitasPagination($perPage, $offset);
    }
}
