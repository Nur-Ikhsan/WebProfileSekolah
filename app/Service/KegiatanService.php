<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Kegiatan;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;

class KegiatanService
{
    private KegiatanRepository $kegiatanRepository;

    public function __construct(KegiatanRepository $kegiatanRepository)
    {
        $this->kegiatanRepository = $kegiatanRepository;
    }

    public function saveKegiatan(Kegiatan $kegiatan): Kegiatan
    {
        $kegiatan->setIdKegiatan(Uuid::uuid4()->toString());
        return $this->kegiatanRepository->saveKegiatan($kegiatan);
    }

    public function findKegiatanById(string $id): ?Kegiatan
    {
        return $this->kegiatanRepository->findKegiatanById($id);
    }

    public function updateKegiatan(Kegiatan $kegiatan): Kegiatan
    {
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