<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Prestasi;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\PrestasiRequest;
use Rubygroup\WebProfileSekolah\Repository\PrestasiRepository;

class PrestasiService
{
    private PrestasiRepository $prestasiRepository;

    public function __construct(PrestasiRepository $prestasiRepository)
    {
        $this->prestasiRepository = $prestasiRepository;
    }

    public function getAllPrestasi(): array
    {
        return $this->prestasiRepository->getAllPrestasi();
    }

    public function getAllPrestasiPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->prestasiRepository->getAllPrestasiPagination($perPage, $offset);
    }

    public function createPrestasi(PrestasiRequest $request): Prestasi
    {
        $prestasi = new Prestasi();
        $prestasi->setId(Uuid::uuid4()->toString());
        $prestasi->setTanggal($request->tanggal);
        $prestasi->setKategori($request->kategori);
        $prestasi->setNama($request->nama);


        $savePrestasi = $this->prestasiRepository->savePrestasi($prestasi);

        return $savePrestasi;
    }

    public function getPrestasiById(string $id): Prestasi
    {
        $prestasi = $this->prestasiRepository->findPrestasiById($id);
        if ($prestasi === null) {
            throw new ValidationException('Prestasi tidak ditemukan.');
        }

        return $prestasi;
    }

    public function updatePrestasi(string $id, PrestasiRequest $request): Prestasi
    {
        $prestasi = $this->prestasiRepository->findPrestasiById($id);
        if ($prestasi === null) {
            throw new ValidationException('Prestasi tidak ditemukan.');
        }

        $prestasi->setTanggal($request->tanggal);
        $prestasi->setKategori($request->kategori);
        $prestasi->setNama($request->nama);

        $updatedPrestasi = $this->prestasiRepository->updatePrestasi($prestasi);

        return $updatedPrestasi;
    }

    public function deletePrestasi(string $id): bool
    {
        $prestasi = $this->prestasiRepository->findPrestasiById($id);
        if ($prestasi === null) {
            throw new ValidationException('Prestasi tidak ditemukan.');
        }

        return $this->prestasiRepository->deletePrestasi($prestasi);
    }
}