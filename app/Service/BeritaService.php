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

    public function searchBerita(string $searchQuery): array
    {
        $searchQuery = "%$searchQuery%"; // Tambahkan wildcard (%) pada awal dan akhir query

        $statement = $this->connection->prepare('SELECT * FROM berita WHERE judul_berita LIKE :searchQuery OR isi_berita LIKE :searchQuery');
        $statement->bindValue(':searchQuery', $searchQuery, PDO::PARAM_STR);
        $statement->execute();

        $rows = $statement->fetchAll();
        $beritaList = [];
        foreach ($rows as $row) {
            $berita = new Berita();
            $berita->setIdBerita((string)$row['id_berita']);
            $berita->setTanggal((string)$row['tanggal']);
            $berita->setJudulBerita((string)$row['judul_berita']);
            $berita->setSlug((string)$row['slug']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }

    public function getBeritaBySlug(string $slug): Berita
    {

        $berita = $this->beritaRepository->findBeritaBySlug($slug);
        if ($berita === null) {
            throw new ValidationException('Berita tidak ditemukan.');
        }
        return $berita;

    }
}