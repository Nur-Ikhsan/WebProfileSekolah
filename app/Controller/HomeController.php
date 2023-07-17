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
        View::renderHome('index',[
            'slideshows' => $slideshows
            ]);
    }

    function berita(): void
    {
        View::renderHome('berita',[
            'title' => 'Berita'
            ]
        );
    }

    // visi-misi
    function visiMisi(): void
    {
        View::renderHome('visi-misi',[
            'title' => 'Visi dan Misi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    // tujuan
    function tujuan(): void
    {
        View::renderHome('tujuan',[
            'title' => 'Tujuan Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    //kurikulum
function kurikulum(): void
    {
        View::renderHome('kurikulum',[
            'title' => 'Kurikulum Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function galeri(): void
    {
        View::renderHome('galeri',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }


}