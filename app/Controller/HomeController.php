<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Prestasi;
use Rubygroup\WebProfileSekolah\Entity\Sekolah;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Repository\BeritaRepository;
use Rubygroup\WebProfileSekolah\Repository\EkstrakurikulerRepository;
use Rubygroup\WebProfileSekolah\Repository\FasilitasRepository;
use Rubygroup\WebProfileSekolah\Repository\GaleriRepository;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Repository\KegiatanRepository;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Repository\KurikulumRepository;
use Rubygroup\WebProfileSekolah\Repository\PPDBRepository;
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
use Rubygroup\WebProfileSekolah\Service\PPDBService;
use Rubygroup\WebProfileSekolah\Service\PrestasiService;
use Rubygroup\WebProfileSekolah\Service\SearchService;
use Rubygroup\WebProfileSekolah\Service\SekolahService;
use Rubygroup\WebProfileSekolah\Service\SlideshowService;

use Faker\Factory as FakerFactory;

// Pastikan path ini sesuai dengan file autoload.php pada proyek Anda


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
    private SearchService $searchService;
    private PPDBService $ppdbService;
    private Sekolah $sekolah;


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
        $ppdbRepository = new PPDBRepository($connection);


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
        $this->searchService = new SearchService($beritaRepository, $kegiatanRepository);
        $this->ppdbService = new PPDBService($ppdbRepository);

        $this->sekolah = $this->sekolahService->getSekolah();
    }

    function index(): void
    {
        $slideshows = $this->slideshowService->getAllSlideshows();
        $beritaList = $this->beritaService->getAllBerita();
        $ekstrakurikulerList = $this->ekstrakurikulerService->getAllEkstrakurikuler();
        $prestasiList = $this->prestasiService->getAllPrestasi();
        $ppdb = $this->ppdbService->getPPDB();
        $guruStaffList = $this->guruStaffService->getAllGuruStaff();

        View::renderHome('index', [
            'slideshows' => $slideshows,
            'beritaList' => $beritaList,
            'ekstrakurikulerList' => $ekstrakurikulerList,
            'prestasiList' => $prestasiList,
            'guruStaffList' => $guruStaffList,
            'ppdb' => $ppdb,
            'sekolah' => $this->sekolah
        ]);
    }

    function berita(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 12;

        $totalCount = count($this->beritaService->getAllBerita());
        $beritaList = $this->beritaService->getAllBeritaPagination($page, $perPage);
        $slideshows = $this->slideshowService->getAllSlideshows();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $totalCount = count($this->beritaService->searchBerita($search));
            $beritaList = $this->beritaService->searchBeritaPagination($page, $perPage, $search);
        }

        View::renderHome('Berita Madrasah Tsanawiyah Negeri 2 Sambas', [
            'title' => 'Berita',
            'search' => $search ?? '',
            'slideshows' => $slideshows,
            'beritaList' => $beritaList,
            'pagination' => [
                'page' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($totalCount / $perPage)
            ],
            'sekolah' => $this->sekolah
        ]);
    }

    function detailBerita(string $slug): void
    {
        $berita = null;
        try {
            $berita = $this->beritaService->getBeritaBySlug($slug);
        } catch (ValidationException $e) {
            View::render404();
            return;
        }
        View::renderHome('detail-berita', [
                'title' => $berita->getJudulBerita()?? '',
                'berita' => $berita,
                'sekolah' => $this->sekolah
            ]
        );
    }

    function visiMisi(): void
    {
        $visiMisi = $this->ketSekolahService->getVisiMisi();
        View::renderHome('visi-misi', [
                'title' => 'Visi dan Misi Madrasah Tsanawiyah Negeri 2 Sambas ',
                'visiMisi' => $visiMisi,
                'sekolah' => $this->sekolah
            ]
        );
    }

    function kurikulum(): void
    {
        $kurikulumList = $this->kurikulumService->getAllKurikulum();
        $kurikulum = $this->ketSekolahService->getKurikulum();
        $slideshows = $this->slideshowService->getAllSlideshows();
        View::renderHome('kurikulum', [
                'title' => 'Kurikulum Madrasah Tsanawiyah Negeri 2 Sambas ',
                'kurikulumList' => $kurikulumList,
                'kurikulum' => $kurikulum,
                'slideshows' => $slideshows,
                'sekolah' => $this->sekolah
            ]
        );
    }

    function galeri(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 12;

        $totalCount = count($this->galeriService->getAllGaleri());
        $galeriList = $this->galeriService->getAllGaleriPagination($page, $perPage);
        $slideshows = $this->slideshowService->getAllSlideshows();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $totalCount = count($this->galeriService->galeriSearch($search));
            $galeriList = $this->galeriService->getAllGaleriSearch($page, $perPage, $search);
        }


        View::renderHome('galeri', [
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'search' => $search ?? '',
                'slideshows' => $slideshows,
                'galeriList' => $galeriList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ],
                'sekolah' => $this->sekolah
            ]
        );
    }

    function strukturOrganisasi(): void
    {
        $strukturOrganisasi = $this->ketSekolahService->getStrukturOrganisasi();
        View::renderHome('struktur-organisasi',[
                'title' => 'Struktur Organisasi Madrasah Tsanawiyah Negeri 2 Sambas ',
                'strukturOrganisasi' => $strukturOrganisasi,
                'sekolah' => $this->sekolah
            ]
        );
    }

    function ekstrakurikuler(): void
    {
        View::renderHome('ekstrakurikuler',[
                'title' => 'Ekstrakurikuler Madrasah Tsanawiyah Negeri 2 Sambas ',
                'sekolah' => $this->sekolah
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
                'title' => 'Fasilitas Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'fasilitasList' => $fasilitasList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ],
                'sekolah' => $this->sekolah
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
                'title' => 'Kegiatan Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'kegiatanList' => $kegiatanList,
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ],
                'sekolah' => $this->sekolah
            ]
        );
    }

    function detailKegiatanSekolah($slug): void
    {
        $kegiatan = null;
        try {
            $kegiatan = $this->kegiatanService->getKegiatanBySlug($slug);
        } catch (ValidationException $e) {
            View::render404();
            return;
        }

        View::renderHome('detail-kegiatan',[
                'title' => $kegiatan->getNamaKegiatan() ?? '',
                'kegiatan' => $kegiatan,
                'sekolah' => $this->sekolah
            ]
        );
    }

    function guruStaf(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 12;

        $totalCount = count($this->guruStaffService->getAllGuruStaff());
        $GuruStaffList = $this->guruStaffService->getAllGuruStaffPagination($page, $perPage);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $totalCount = count($this->guruStaffService->searchGuruStaff($search));
            $GuruStaffList = $this->guruStaffService->searchGuruStaffPagination($search, $page, $perPage);
        }

        View::renderHome('guru-staff',[
                'title' => 'Guru dan Staff Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'guruStaffList' => $GuruStaffList,
                'search' => $search ?? '',
                'pagination' => [
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCount / $perPage)
                ],
                'sekolah' => $this->sekolah
            ]
        );
    }

    function sejarahSekolah(): void{
        View::renderHome('sejarah-sekolah',[
                'title' => 'Sejarah Sekolah Madrasah Tsanawiyah Negeri 2 Sambas ',
                'sekolah' => $this->sekolah
            ]
        );
    }

    function hasilPencarian(): void{
        $slideshows = $this->slideshowService->getAllSlideshows();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $searchResult = $this->searchService->searchCombinedResults($search);
        }

        View::renderHome('hasil-pencarian',[
                'title' => 'Hasil Pencarian Madrasah Tsanawiyah Negeri 2 Sambas ',
                'slideshows' => $slideshows,
                'search' => $search ?? '',
                'searchResult' => $searchResult,
                'sekolah' => $this->sekolah
            ]
        );
    }

}