<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Kurikulum;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\KurikulumRequest;
use Rubygroup\WebProfileSekolah\Repository\KurikulumRepository;

class KurikulumService
{
    private KurikulumRepository $kurikulumRepository;

    public function __construct(KurikulumRepository $kurikulumRepository)
    {
        $this->kurikulumRepository = $kurikulumRepository;
    }

    public function getAllKurikulum(): array
    {
        return $this->kurikulumRepository->getAllKurikulum();
    }

    public function getAllKurikulumPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->kurikulumRepository->getAllKurikulumPagination($perPage, $offset);
    }

    public function createKurikulum(KurikulumRequest $request): Kurikulum
    {
        $kurikulum = new Kurikulum();
        $kurikulum->setId(Uuid::uuid4()->toString());
        $kurikulum->setKomponen($request->komponen);
        $kurikulum->setSubKomponen($request->subKomponen);
        $kurikulum->setKategori($request->kategori);

        $saveKurikulum = $this->kurikulumRepository->saveKurikulum($kurikulum);

        return $saveKurikulum;
    }

    public function getKurikulumById(string $id): Kurikulum
    {
        $kurikulum = $this->kurikulumRepository->findKurikulumById($id);
        if ($kurikulum === null) {
            throw new ValidationException('Kurikulum tidak ditemukan.');
        }

        return $kurikulum;
    }

    public function updateKurikulum(string $id, KurikulumRequest $request): Kurikulum
    {
        $kurikulum = $this->kurikulumRepository->findKurikulumById($id);
        if ($kurikulum === null) {
            throw new ValidationException('Kurikulum tidak ditemukan.');
        }

        $kurikulum->setKomponen($request->komponen);
        $kurikulum->setSubKomponen($request->subKomponen);
        $kurikulum->setKategori($request->kategori);

        $updateKurikulum = $this->kurikulumRepository->updateKurikulum($kurikulum);

        return $updateKurikulum;
    }

    public function deleteKurikulum(string $id): bool
    {
        $kurikulum = $this->kurikulumRepository->findKurikulumById($id);
        if ($kurikulum === null) {
            throw new ValidationException('Kurikulum tidak ditemukan.');
        }

        $deleteKurikulum = $this->kurikulumRepository->deleteKurikulum($kurikulum);

        return $deleteKurikulum;
    }

}