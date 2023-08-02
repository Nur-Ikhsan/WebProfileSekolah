<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Kegiatan;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\KegiatanRequest;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class KegiatanService
{
    private KegiatanRepository $kegiatanRepository;
    private ValidationUtil $validationUtil;

    public function __construct(KegiatanRepository $kegiatanRepository)
    {
        $this->kegiatanRepository = $kegiatanRepository;
        $this->validationUtil = new ValidationUtil();
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/kegiatan/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function createKegiatan(KegiatanRequest $request): Kegiatan
    {
        $this->validationUtil->validateImageFile($request->foto);

        $kegiatan = new Kegiatan();
        $kegiatan->setIdKegiatan(Uuid::uuid4()->toString());
        $kegiatan->setTanggal($request->tanggal);
        $kegiatan->setNamaKegiatan($request->namaKegiatan);
        $kegiatan->setDeskripsi($request->deskripsi);
        $kegiatan->setFoto($this->uploadPhoto($request->foto));

        return $this->kegiatanRepository->saveKegiatan($kegiatan);
    }

    public function getKegiatanById(string $id): ?Kegiatan
    {
        return $this->kegiatanRepository->findKegiatanById($id);
    }

    public function updateKegiatan(string $id, KegiatanRequest $request): Kegiatan
    {
        $kegiatan = $this->kegiatanRepository->findKegiatanById($id);
        if ($kegiatan === null) {
            throw new ValidationException('Kegiatan tidak ditemukan.');
        }

        if (!empty($request->foto['name'])) {
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/kegiatan/' . $kegiatan->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $kegiatan->setFoto($this->uploadPhoto($request->foto));
        }

        $kegiatan->setTanggal($request->tanggal);
        $kegiatan->setNamaKegiatan($request->namaKegiatan);
        $kegiatan->setDeskripsi($request->deskripsi);

        return $this->kegiatanRepository->updateKegiatan($kegiatan);
    }

    public function getAllKegiatan(): array
    {
        return $this->kegiatanRepository->getAllKegiatan();
    }

    public function deleteKegiatan(string $id): bool
    {

        return $this->kegiatanRepository->deleteKegiatan($id);
    }

    public function getAllKegiatanPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->kegiatanRepository->getAllKegiatanPagination($perPage, $offset);
    }

}