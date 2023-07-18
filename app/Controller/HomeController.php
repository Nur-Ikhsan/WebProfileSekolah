<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Prestasi;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\EkstrakurikulerRepository;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Repository\KurikulumRepository;
use Rubygroup\WebProfileSekolah\Repository\PrestasiRepository;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\BeritaService;
use Rubygroup\WebProfileSekolah\Service\EkstrakurikulerService;
use Rubygroup\WebProfileSekolah\Service\GuruStaffService;
use Rubygroup\WebProfileSekolah\Service\KetSekolahService;
use Rubygroup\WebProfileSekolah\Service\KurikulumService;
use Rubygroup\WebProfileSekolah\Service\PrestasiService;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class HomeController
{

    private SlideshowService $slideshowService;
    private BeritaService $beritaService;
    private EkstrakurikulerService $ekstrakurikulerService;
    private PrestasiService $prestasiService;
    private GuruStaffService $guruStaffService;
    private KetSekolahService $ketSekolahService;
    private KurikulumService $kurikulumService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $slideshowRepository = new SlideshowRepository($connection);
        $this->slideshowService = new SlideshowService($slideshowRepository);
        $beritaRepository = new BeritaRepository($connection);
        $this->beritaService = new BeritaService($beritaRepository);
        $ekstrakurikulerRepository = new EkstrakurikulerRepository($connection);
        $this->ekstrakurikulerService = new EkstrakurikulerService($ekstrakurikulerRepository);
        $prestasiRepository = new PrestasiRepository($connection);
        $this->prestasiService = new PrestasiService($prestasiRepository);
        $guruStaffRepository = new GuruStaffRepository($connection);
        $this->guruStaffService = new GuruStaffService($guruStaffRepository);
        $ketSekolahRepository = new KetSekolahRepository($connection);
        $this->ketSekolahService = new KetSekolahService($ketSekolahRepository);
        $kurikulumRepository = new KurikulumRepository($connection);
        $this->kurikulumService = new KurikulumService($kurikulumRepository);
    }

    function index(): void
    {
        $slideshows = $this->slideshowService->getAllSlideshows();
        $beritaList = $this->beritaService->getAllBerita();
        $ekstrakurikulerList = $this->ekstrakurikulerService->getAllEkstrakurikuler();
        $prestasiList = $this->prestasiService->getAllPrestasi();
        $guruStaffList = $this->guruStaffService->getAllGuruStaff();

        View::renderHome('index', [
            'slideshows' => $slideshows,
            'beritaList' => $beritaList,
            'ekstrakurikulerList' => $ekstrakurikulerList,
            'prestasiList' => $prestasiList,
            'guruStaffList' => $guruStaffList,
        ]);
    }

    function berita(): void
    {
        View::renderHome('berita', [
                'title' => 'Berita'
            ]
        );
    }

    // visi-misi
    function visiMisi(): void
    {
        View::renderHome('visi-misi', [
                'title' => 'Visi dan Misi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    // tujuan
    function tujuan(): void
    {
        View::renderHome('tujuan', [
                'title' => 'Tujuan Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    //kurikulum
    function kurikulum(): void
    {
        $kurikulumList = $this->kurikulumService->getAllKurikulum();
        $kurikulum = $this->ketSekolahService->getKurikulum();
        View::renderHome('kurikulum', [
                'title' => 'Kurikulum Madrasah Tsanawiyah Negeri 2 Sambas ',
                'kurikulumList' => $kurikulumList,
                'kurikulum' => $kurikulum
            ]
        );
    }

    function galeri(): void
    {
        View::renderHome('galeri', [
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }


}