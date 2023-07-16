<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubygroup\WebProfileSekolah\App\Router;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Controller\BeritaController;
use Rubygroup\WebProfileSekolah\Controller\EkstrakurikulerController;
use Rubygroup\WebProfileSekolah\Controller\FasilitasController;
use Rubygroup\WebProfileSekolah\Controller\GaleriController;
use Rubygroup\WebProfileSekolah\Controller\GuruStaffController;
use Rubygroup\WebProfileSekolah\Controller\HomeController;
use Rubygroup\WebProfileSekolah\Controller\AdminController;
use Rubygroup\WebProfileSekolah\Controller\KegiatanController;
use Rubygroup\WebProfileSekolah\Controller\PrestasiController;
use Rubygroup\WebProfileSekolah\Controller\SekolahController;
use Rubygroup\WebProfileSekolah\Controller\SlideshowController;
use Rubygroup\WebProfileSekolah\Controller\KetSekolahController;

Database::getConnection('production');

// Rute untuk halaman Web Profile Sekolah
Router::add('/', HomeController::class, 'index');
Router::add('/index', HomeController::class, 'index');
Router::add('/berita', HomeController::class, 'berita');
Router::add('/visi-misi', HomeController::class, 'visiMisi');
Router::add('/tujuan', HomeController::class, 'tujuan');
Router::add('/kurikulum', HomeController::class, 'kurikulum');
Router::add('/ppdb', HomeController::class, 'ppdb');
Router::add('/detail_berita', HomeController::class, 'detail_berita');
Router::add('/guru_staff', HomeController::class, 'guru_staff');
Router::add('/galeri', HomeController::class, 'galeri');
Router::add('/fasilitas_sekolah', HomeController::class, 'fasilitas_sekolah');



// Rute untuk admin
Router::add('/admin', AdminController::class, 'index');
Router::add('/admin/', AdminController::class, 'index');
Router::add('/admin/index', AdminController::class, 'index');
Router::add('/admin/register', AdminController::class, 'register');
Router::add('/admin/login', AdminController::class, 'login');
Router::add('/admin/logout', AdminController::class, 'logout');
Router::add('/admin/profile', AdminController::class, 'editProfile');
Router::add('/admin/ganti-password', AdminController::class, 'changePassword');

Router::add('/admin/k/k', AdminController::class, 'k');

Router::add('/admin/slideshow/tambah', SlideshowController::class, 'tambahSlideshow');
Router::add('/admin/slideshow/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', SlideshowController::class, 'deleteSlideshow');
Router::add('/admin/slideshow/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', SlideshowController::class, 'editSlideshow');

Router::add('/admin/sekolah/tentang', SekolahController::class, 'tentang');
Router::add('/admin/sekolah/tentang/edit', SekolahController::class, 'editSekolah');

Router::add('/admin/sekolah/fasilitas', FasilitasController::class, 'showFasilitasPagination');
Router::add('/admin/sekolah/fasilitas/tambah', FasilitasController::class, 'tambahFasilitas');
Router::add('/admin/sekolah/fasilitas/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', FasilitasController::class, 'editFasilitas');
Router::add('/admin/sekolah/fasilitas/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', FasilitasController::class, 'deleteFasilitas');

Router::add('/admin/sekolah/guru-staff', GuruStaffController::class, 'showGuruStaffPagination');
Router::add('/admin/sekolah/guru-staff/tambah', GuruStaffController::class, 'tambahGuruStaff');
Router::add('/admin/sekolah/guru-staff/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GuruStaffController::class, 'editGuruStaff');
Router::add('/admin/sekolah/guru-staff/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GuruStaffController::class, 'deleteGuruStaff');

Router::add('/admin/sekolah/kegiatan-sekolah', KegiatanController::class, 'showKegiatanPagination');
Router::add('/admin/sekolah/kegiatan-sekolah/tambah', KegiatanController::class, 'tambahKegiatan');
Router::add('/admin/sekolah/kegiatan-sekolah/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', KegiatanController::class, 'editKegiatan');
Router::add('/admin/sekolah/kegiatan-sekolah/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', KegiatanController::class, 'hapusKegiatan');

Router::add('/admin/sekolah/visi-misi', KetSekolahController::class, 'visiMisi');
Router::add('/admin/sekolah/visi-misi/edit', KetSekolahController::class, 'editVisiMisi');

Router::add('/admin/sekolah/struktur-organisasi', KetSekolahController::class, 'strukturOrganisasi');
Router::add('/admin/sekolah/struktur-organisasi/edit', KetSekolahController::class, 'editStrukturOrganisasi');

Router::add('/admin/sekolah/ekstrakurikuler', EkstrakurikulerController::class, 'showEkstrakurikulerPagination');
Router::add('/admin/sekolah/ekstrakurikuler/tambah', EkstrakurikulerController::class, 'tambahEkstrakurikuler');
Router::add('/admin/sekolah/ekstrakurikuler/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', EkstrakurikulerController::class, 'editEkstrakurikuler');
Router::add('/admin/sekolah/ekstrakurikuler/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', EkstrakurikulerController::class, 'deleteEkstrakurikuler');

Router::add('/admin/sekolah/prestasi', PrestasiController::class, 'showPrestasiPagination');
Router::add('/admin/sekolah/prestasi/tambah', PrestasiController::class, 'tambahPrestasi');
Router::add('/admin/sekolah/prestasi/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', PrestasiController::class, 'editPrestasi');
Router::add('/admin/sekolah/prestasi/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', PrestasiController::class, 'deletePrestasi');

Router::add('/admin/galeri', GaleriController::class, 'showGaleriPagination');
Router::add('/admin/galeri/tambah', GaleriController::class, 'tambahGaleri');
Router::add('/admin/galeri/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GaleriController::class, 'editGaleri');
Router::add('/admin/galeri/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GaleriController::class, 'deleteGaleri');

Router::add('/admin/berita', BeritaController::class, 'showBeritaPagination');
Router::add('/admin/berita/tambah', BeritaController::class, 'tambahBerita');
Router::add('/admin/berita/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', BeritaController::class, 'editBerita');
Router::add('/admin/berita/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', BeritaController::class, 'deleteBerita');