<?php

namespace Rubygroup\WebProfileSekolah\Service;

use PDO;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;

class SearchService
{
    private BeritaRepository $beritaRepository;
    private KegiatanRepository $kegiatanRepository;

    public function __construct(BeritaRepository $beritaRepository, KegiatanRepository $kegiatanRepository)
    {
        $this->beritaRepository = $beritaRepository;
        $this->kegiatanRepository = $kegiatanRepository;
    }

    public function searchCombinedResults(string $searchQuery): array
    {
        $beritaResults = $this->beritaRepository->searchBerita($searchQuery);
        $kegiatanResults = $this->kegiatanRepository->searchKegiatan($searchQuery);

        // Menggabungkan hasil pencarian dengan atribut yang diubah agar namanya sama
        $combinedResults = [];

        foreach ($beritaResults as $berita) {
            $combinedResults[] = [
                'id' => $berita->getIdBerita(),
                'tanggal' => $berita->getTanggal(),
                'judul' => $berita->getJudulBerita(),
                'slug' => $berita->getSlug(),
                'deskripsi' => $berita->getIsiBerita(),
                'foto' => '/images/upload/berita/'.$berita->getFoto(),
            ];
        }

        foreach ($kegiatanResults as $kegiatan) {
            $combinedResults[] = [
                'id' => $kegiatan->getIdKegiatan(),
                'tanggal' => $kegiatan->getTanggal(),
                'judul' => $kegiatan->getNamaKegiatan(),
                'slug' => $kegiatan->getSlug(),
                'deskripsi' => $kegiatan->getDeskripsi(),
                'foto' => '/images/upload/kegiatan/'.$kegiatan->getFoto(),
            ];
        }

        return $combinedResults;
    }
}
