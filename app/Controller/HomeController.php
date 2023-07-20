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
   
        // $faker = FakerFactory::create();

        // Ambil halaman aktif dari query parameter, jika tidak ada, gunakan halaman 1 sebagai default
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    
        // Jumlah berita yang ingin ditampilkan dalam satu halaman
        $perPage = 10;
    
        // // Simulasi data berita
        // $beritaList = [];
        // for ($i = 0; $i < 30; $i++) {
        //     $beritaList[] = [
        //         'title' => $faker->name(),
        //         'content' => $faker->address()
        //     ];
        // }
        $beritaList = $this->beritaService->getAllBerita();
        // Hitung total halaman berdasarkan jumlah berita dan berita per halaman
        $totalPages = ceil(count($beritaList) / $perPage);
    
        // Ambil data berita untuk halaman aktif dari Service dengan sistem paginasi
        $offset = ($currentPage - 1) * $perPage;
        $beritaList = array_slice($beritaList, $offset, $perPage);


        
    
        View::renderHome('berita', [
            'title' => 'Berita',
            'beritaList' => $beritaList,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
        ]);
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




    function pencarianBerita():void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keyword = $_POST['keyword'];
    
            // If the keyword is empty, get all berita
            if (empty($keyword)) {
                $beritaList = $this->beritaService->getAllBerita();
            } else {
                // Panggil fungsi pencarian berita dari BeritaService
                $hasilPencarian = $this->beritaService->cariBerita($keyword);
    
                // Tampilkan hasil pencarian berita pada view hasil_pencarian.php
                View::renderHome('pencarian_berita', [
                    'title' => 'Hasil Pencarian Berita',
                    'hasilPencarian' => $hasilPencarian,
                ]);
                return;
            }
        } else {
            // Jika bukan metode POST, tampilkan halaman berita biasa
            $beritaList = $this->beritaService->getAllBerita();
        }
    
        // Render halaman berita dengan semua berita
        View::renderHome('berita', [
            'title' => 'Berita',
            'beritaList' => $beritaList,
        ]);
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

        $galeriList = $this->galeriService->getAllGaleri();
        
        View::renderHome('galeri',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'galeriList' => $galeriList,
            ]
        );
    }

    function ppdb(): void
    {
        View::renderHome('ppdb',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }
    function struktur_organisasi(): void
    {
        View::renderHome('struktur_organisasi',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas '
            ]
        );
    }
    public function detail_berita(): void
    {
        // Assuming you have access to the berita ID from the URL or some other source
        $beritaId = $_GET['id']; // Replace this with how you retrieve the berita ID

        // Retrieve the specific berita by its ID using the BeritaService
        $berita = $this->beritaService->getBeritaById($beritaId);

        if ($berita) {
            // If the berita is found, pass it to the view
            View::renderHome('detail_berita', [
                'title' => 'Detail Berita',
                'berita' => $berita,
            ]);
        } else {
            http_response_code(404);
            View::render('404');
        }
    }


    function guru_staff(): void
    {

        $guruStaffList = $this->guruStaffService->getAllGuruStaff();
        
        View::renderHome('guru_staff',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'guruStaffList' => $guruStaffList,
            ]
        );
    }

    function fasilitas_sekolah(): void
    {

        $fasilitasList = $this->fasilitasService->getAllFasilitas();
        View::renderHome('fasilitas_sekolah',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'fasilitasList' => $fasilitasList,
            ]
        );
    }

    function kegiatan_sekolah(): void
    {

      $kegiatanList = $this->kegiatanService->getAllKegiatan();
        View::renderHome('kegiatan_sekolah',[
                'title' => 'Galeri Madrasah Tsanawiyah Negeri 2 Sambas ',
                'kegiatanList' => $kegiatanList
            ]
        );
    }


}