<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class HomeController
{

    private SlideshowService $slideshowService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $slideshowRepository = new SlideshowRepository($connection);
        $this->slideshowService = new SlideshowService($slideshowRepository);
    }

    function index(): void
    {
        $slideshows = $this->slideshowService->getAllSlideshows();
        View::render('index',[
            'slideshows' => $slideshows
            ]);
    }

    function berita(): void
    {
        View::render('berita',[
            'title' => 'Berita'
            ]
        );
    }

    // visi-misi
    function visiMisi(): void
    {
        View::render('visi-misi',[
            'title' => 'Visi dan Misi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    // tujuan
    function tujuan(): void
    {
        View::render('tujuan',[
            'title' => 'Tujuan Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    //kurikulum
function kurikulum(): void
    {
        View::render('kurikulum',[
            'title' => 'Kurikulum Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function galeri(): void
    {
        View::render('galeri',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }
    function strukturOrganisasi(): void
    {
        View::render('struktur-organisasi',[
                'title' => 'Struktur Organisasi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }
    function ppdb(): void
    {
        View::render('ppdb',[
                'title' => 'PPBD Organisasi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function kontak(): void
    {
        View::render('kontak',[
                'title' => 'Kontak Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function ekstrakurikuler(): void
    {
        View::render('ekstrakurikuler',[
                'title' => 'Ekstrakurikuler Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function fasilitasSekolah(): void
    {
        View::render('fasilitas-sekolah',[
                'title' => 'Fasilitas Sekolah Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function kegiatanSekolah(): void
    {
        View::render('kegiatan-sekolah',[
                'title' => 'Fasilitas Sekolah Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }


}