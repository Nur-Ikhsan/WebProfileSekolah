<?php

namespace Rubygroup\WebProfileSekolah\Service;

use PDO;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;

class SearchService
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function searchCombinedResults(string $searchQuery): array
    {
        $beritaRepository = new BeritaRepository($this->connection);
        $kegiatanRepository = new KegiatanRepository($this->connection);

        $beritaResults = $beritaRepository->searchBerita($searchQuery);
        $kegiatanResults = $kegiatanRepository->searchKegiatan($searchQuery);

        // Menggabungkan hasil pencarian dengan atribut yang diubah agar namanya sama
        $combinedResults = [];

        foreach ($beritaResults as $berita) {
            $combinedResults[] = [
                'id' => $berita->getIdBerita(),
                'tanggal' => $berita->getTanggal(),
                'judul' => $berita->getJudulBerita(),
                'deskripsi' => $berita->getIsiBerita(),
                'foto' => $berita->getFoto(),
            ];
        }

        foreach ($kegiatanResults as $kegiatan) {
            $combinedResults[] = [
                'id' => $kegiatan->getIdKegiatan(),
                'tanggal' => $kegiatan->getTanggal(),
                'judul' => $kegiatan->getNamaKegiatan(),
                'deskripsi' => $kegiatan->getDeskripsi(),
                'foto' => $kegiatan->getFoto(),
            ];
        }

        return $combinedResults;
    }
}
