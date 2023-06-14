<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;

class HomeController
{

    function index(): void
    {
        View::render('index');
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


}