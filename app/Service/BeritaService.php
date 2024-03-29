<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\Berita;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\BeritaRequest;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class BeritaService
{
    private BeritaRepository $beritaRepository;
    private ValidationUtil $validationUtil;

    public function __construct(BeritaRepository $beritaRepository)
    {
        $this->beritaRepository = $beritaRepository;
        $this->validationUtil = new ValidationUtil();
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/berita/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function createBerita(BeritaRequest $request): Berita
    {
        $this->validationUtil->validateImageFile($request->foto);

        $berita = new Berita();
        $berita->setIdBerita(Uuid::uuid4()->toString());
        $berita->setTanggal($request->tanggal);
        $berita->setJudulBerita($request->judulBerita);
        $berita->setSlug($this->generateSlug($request->tanggal, $request->judulBerita));
        $berita->setIsiBerita($request->isiBerita);
        $berita->setFoto($this->uploadPhoto($request->foto));

        return $this->beritaRepository->saveBerita($berita);
    }

    public function cariBerita(string $keyword): array
    {
        return $this->beritaRepository->searchBerita($keyword);
    }
    public function updateBerita(string $id, BeritaRequest $request): Berita
    {
        $berita = $this->beritaRepository->findBeritaById($id);
        if ($berita === null) {
            throw new ValidationException('Berita tidak ditemukan.');
        }

        if (!empty($request->foto['name'])) {
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/berita/' . $berita->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $berita->setFoto($this->uploadPhoto($request->foto));
        }
        $berita->setTanggal($request->tanggal);
        $berita->setJudulBerita($request->judulBerita);
        $berita->setSlug($this->generateSlug($request->tanggal, $request->judulBerita));
        $berita->setIsiBerita($request->isiBerita);


        return $this->beritaRepository->updateBerita($berita);
    }

    public function deleteBerita(string $id): bool
    {
        $berita = $this->beritaRepository->findBeritaById($id);
        if ($berita === null) {
            throw new ValidationException('Berita tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/berita/' . $berita->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->beritaRepository->deleteBerita($berita->getIdBerita());
    }

    public function getAllBerita(): array
    {
        return $this->beritaRepository->getAllBerita();
    }

    public function getAllBeritaPagination(int $page, int $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->beritaRepository->getBeritaPagination($perPage, $offset);
    }
    public function getTotalPages(int $perPage): int
    {
        // Hitung jumlah total berita
        $totalBerita = $this->beritaRepository->countTotalBerita();

        // Hitung jumlah halaman berdasarkan total berita dan berita per halaman
        return ceil($totalBerita / $perPage);
    }

    public function getBeritaById(string $id): ?Berita
    {
        return $this->beritaRepository->findBeritaById($id);
    }

    private function generateSlug(string $tanggal, string $judulBerita)
    {
        $date = new \DateTime($tanggal);
        $formattedDate = $date->format('Y-m-d');

        // Hilangkan karakter simbol dari judul berita
        $judulBerita = preg_replace('/[^\w\s-]/', '', $judulBerita);

        $slug = $formattedDate . '/' . str_replace(' ', '-', strtolower($judulBerita));
        return $slug;
    }

    public function getBeritaBySlug(string $slug): Berita
    {

        $berita = $this->beritaRepository->findBeritaBySlug($slug);
        if ($berita === null) {
            throw new ValidationException('Berita tidak ditemukan.');
        }
        return $berita;

    }

    public function searchBerita(mixed $search)
    {
        return $this->beritaRepository->searchBerita($search);
    }

    public function searchBeritaPagination(int $page, int $perPage, string $search)
    {
        $offset = ($page - 1) * $perPage;
        return $this->beritaRepository->searchBeritaPagination($perPage, $offset, $search);
    }
}