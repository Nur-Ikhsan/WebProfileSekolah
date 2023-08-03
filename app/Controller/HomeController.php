<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Prestasi;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\EkstrakurikulerRepository;
use Rubygroup\WebProfileSekolah\Repository\FasilitasRepository;
use Rubygroup\WebProfileSekolah\Repository\GaleriRepository;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Repository\KurikulumRepository;
use Rubygroup\WebProfileSekolah\Repository\PrestasiRepository;
use Rubygroup\WebProfileSekolah\Repository\SekolahRepository;
use Rubygroup\WebProfileSekolah\Repository\SlideshowRepository;
use Rubygroup\WebProfileSekolah\Service\BeritaService;
use Rubygroup\WebProfileSekolah\Service\EkstrakurikulerService;
use Rubygroup\WebProfileSekolah\Service\FasilitasService;
use Rubygroup\WebProfileSekolah\Service\GaleriService;
use Rubygroup\WebProfileSekolah\Service\GuruStaffService;
use Rubygroup\WebProfileSekolah\Service\KegiatanService;
use Rubygroup\WebProfileSekolah\Service\KetSekolahService;
use Rubygroup\WebProfileSekolah\Service\KurikulumService;
use Rubygroup\WebProfileSekolah\Service\PrestasiService;
use Rubygroup\WebProfileSekolah\Service\SekolahService;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

class HomeController
{

    private BeritaService $beritaService;
    private EkstrakurikulerService $ekstrakurikulerService;
    private FasilitasService $fasilitasService;
    private GaleriService $galeriService;
    private GuruStaffService $guruStaffService;
    private KegiatanService $kegiatanService;
    private KetSekolahService $ketSekolahService;
    private KurikulumService $kurikulumService;
    private PrestasiService $prestasiService;
    private SekolahService $sekolahService;
    private SlideshowService $slideshowService;


    public function __construct()
    {
        $connection = Database::getConnection();

        $beritaRepository = new BeritaRepository($connection);
        $ekstrakurikulerRepository = new EkstrakurikulerRepository($connection);
        $fasilitasRepository = new FasilitasRepository($connection);
        $galeriRepository = new GaleriRepository($connection);
        $guruStaffRepository = new GuruStaffRepository($connection);
        $kegiatanRepository = new KegiatanRepository($connection);
        $ketSekolahRepository = new KetSekolahRepository($connection);
        $kurikulumRepository = new KurikulumRepository($connection);
        $prestasiRepository = new PrestasiRepository($connection);
        $sekolahRepository = new SekolahRepository($connection);
        $slideshowRepository = new SlideshowRepository($connection);


        $this->beritaService = new BeritaService($beritaRepository);
        $this->ekstrakurikulerService = new EkstrakurikulerService($ekstrakurikulerRepository);
        $this->fasilitasService = new FasilitasService($fasilitasRepository);
        $this->galeriService = new GaleriService($galeriRepository);
        $this->guruStaffService = new GuruStaffService($guruStaffRepository);
        $this->kegiatanService = new KegiatanService($kegiatanRepository);
        $this->ketSekolahService = new KetSekolahService($ketSekolahRepository);
        $this->kurikulumService = new KurikulumService($kurikulumRepository);
        $this->prestasiService = new PrestasiService($prestasiRepository);
        $this->sekolahService = new SekolahService($sekolahRepository);
        $this->slideshowService = new SlideshowService($slideshowRepository);
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
        $beritaList = $this->beritaService->getAllBerita();
        View::renderHome('berita', [
                'title' => 'Berita',
                'news' => $beritaList
            ]
        );
    }

    // visi-misi
    function visiMisi(): void
    {
        $visiMisi = $this->ketSekolahService->getVisiMisi();
        View::renderHome('visi-misi', [
                'title' => 'Visi dan Misi Madrasah Tsanawiyah Negeri 2 Sambas ',
                'visiMisi' => $visiMisi
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
    function strukturOrganisasi(): void
    {
        $strukturOrganisasi = $this->ketSekolahService->getStrukturOrganisasi();
        View::renderHome('struktur_organisasi',[
                'title' => 'Struktur Organisasi Madrasah Tsanawiyah Negeri 2 Sambas ',
                'strukturOrganisasi' => $strukturOrganisasi
            ]
        );
    }
    function ppdb(): void
    {
        View::renderHome('ppdb',[
                'title' => 'PPBD Organisasi Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function kontak(): void
    {
        View::renderHome('kontak',[
                'title' => 'Kontak Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }

    function ekstrakurikuler(): void
    {
        View::renderHome('ekstrakurikuler',[
                'title' => 'Ekstrakurikuler Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }


    function fasilitasSekolah(): void
    {
        $title = null;
        $message = null;
        $error = null;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 12;
        // Menghitung total jumlah slideshow
        $totalCount = count($this->fasilitasService->getAllFasilitas());
        $fasilitasList = $this->fasilitasService->getAllFasilitasPagination($page, $perPage);
        View::renderHome('fasilitas-sekolah', [
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'fasilitasList' => $fasilitasList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ]
            ]
        );
    }


    function kegiatanSekolah(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        $totalCount = count($this->kegiatanService->getAllKegiatan());
        $kegiatanList = $this->kegiatanService->getAllKegiatanPagination($page, $perPage);
        View::renderHome('kegiatan-sekolah',[
                'title' => 'Fasilitas Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'kegiatanList' => $kegiatanList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ]
            ]
        );
    }

    function guruStaf(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 12;

        $totalCount = count($this->guruStaffService->getAllGuruStaff());
        $GuruStaffList = $this->guruStaffService->getAllGuruStaffPagination($page, $perPage);
        View::renderHome('guru-staff',[
                'title' => 'Guru dan Staff Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'guruStaffList' => $GuruStaffList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ]
            ]
        );
    }

    function sejarahSekolah(): void{
        View::renderHome('sejarah-sekolah',[
                'title' => 'Sejarah Sekolah Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }
}