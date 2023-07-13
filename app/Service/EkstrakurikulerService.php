<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Ekstrakurikuler;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\EkstrakurikulerRequest;
use Rubygroup\WebProfileSekolah\Repository\EkstrakurikulerRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class EkstrakurikulerService
{
    private EkstrakurikulerRepository $ekstrakurikulerRepository;
    private ValidationUtil $validationUtil;

    public function __construct(EkstrakurikulerRepository $ekstrakurikulerRepository)
    {
        $this->ekstrakurikulerRepository = $ekstrakurikulerRepository;
        $this->validationUtil = new ValidationUtil();
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/ekstrakurikuler/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function createEkstrakurikuler(EkstrakurikulerRequest $request): Ekstrakurikuler
    {
        $this->validationUtil->validateImageFile($request->icon);

        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->setIdEkstrakurikuler(Uuid::uuid4()->toString());
        $ekstrakurikuler->setNamaEkstrakurikuler($request->namaEkstrakurikuler);
        $ekstrakurikuler->setDeskripsi($request->deskripsi);
        $ekstrakurikuler->setIcon($this->uploadPhoto($request->icon));

        $savedEkstrakurikuler = $this->ekstrakurikulerRepository->saveEkstrakurikuler($ekstrakurikuler);

        return $savedEkstrakurikuler;
    }

    public function updateEkstrakurikuler(string $id, EkstrakurikulerRequest $request): Ekstrakurikuler
    {
        $this->validationUtil->validateImageFile($request->icon);

        $ekstrakurikuler = $this->ekstrakurikulerRepository->findEkstrakurikulerById($id);
        if (!$ekstrakurikuler) {
            throw new ValidationException("Ekstrakurikuler not found for id $id");
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/ekstrakurikuler/' . $ekstrakurikuler->getIcon(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if ($request->icon != null) {
            $ekstrakurikuler->setIcon($this->uploadPhoto($request->icon));
        }

        $updatedEkstrakurikuler = $this->ekstrakurikulerRepository->updateEkstrakurikuler($ekstrakurikuler);
        return $updatedEkstrakurikuler;
    }

    public function deleteEkstrakurikuler(string $id): bool
    {
        $ekstrakurikuler = $this->ekstrakurikulerRepository->findEkstrakurikulerById($id);
        if (!$ekstrakurikuler) {
            throw new ValidationException("Ekstrakurikuler not found for id $id");
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/ekstrakurikuler/' . $ekstrakurikuler->getIcon(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->ekstrakurikulerRepository->deleteEkstrakurikuler($ekstrakurikuler);
    }

    public function getAllEkstrakurikuler(): array
    {
        return $this->ekstrakurikulerRepository->getAllEkstrakurikuler();
    }

    public function getAllEkstrakurikulerPagination(int $page, int $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->ekstrakurikulerRepository->getAllEkstrakurikulerPagination($perPage, $offset);
    }

    public function getEkstrakurikulerById(string $id): ?Ekstrakurikuler
    {
        $ekstrakurikuler = $this->ekstrakurikulerRepository->findEkstrakurikulerById($id);
        if (!$ekstrakurikuler) {
            throw new ValidationException("Ekstrakurikuler not found for id $id");
        }
        return $ekstrakurikuler;
    }

}