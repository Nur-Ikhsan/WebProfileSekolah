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
use Rubygroup\WebProfileSekolah\Controller\KurikulumController;
use Rubygroup\WebProfileSekolah\Controller\PPDBController;
use Rubygroup\WebProfileSekolah\Controller\PrestasiController;
use Rubygroup\WebProfileSekolah\Controller\SekolahController;
use Rubygroup\WebProfileSekolah\Controller\SlideshowController;
use Rubygroup\WebProfileSekolah\Controller\KetSekolahController;

Database::getConnection('production');

// Rute untuk halaman Web Profile Sekolah
Router::add('/', HomeController::class, 'index');
Router::add('/index', HomeController::class, 'index');
Router::add('/berita', HomeController::class, 'berita');
Router::add('/berita/([0-9]{4}-[0-9]{2}-[0-9]{2}/[a-z0-9-]+)', HomeController::class, 'detailBerita');
Router::add('/visi-misi', HomeController::class, 'visiMisi');
Router::add('/kurikulum', HomeController::class, 'kurikulum');
Router::add('/galeri', HomeController::class, 'galeri');
Router::add('/struktur-organisasi', HomeController::class, 'strukturOrganisasi');
Router::add('/kontak', HomeController::class, 'kontak');
Router::add('/ekstrakurikuler', HomeController::class, 'ekstrakurikuler');
Router::add('/fasilitas-sekolah', HomeController::class, 'fasilitasSekolah');
Router::add('/kegiatan-sekolah', HomeController::class, 'kegiatanSekolah');
Router::add('/kegiatan-sekolah/([0-9]{4}-[0-9]{2}-[0-9]{2}/[a-z0-9-]+)', HomeController::class, 'detailKegiatanSekolah');
Router::add('/guru-staff', HomeController::class, 'guruStaf');
Router::add('/sejarah-sekolah', HomeController::class, 'sejarahSekolah');
Router::add('/hasil-pencarian', HomeController::class, 'hasilPencarian');


Router::add('/ppdb', PPDBController::class, 'index');
Router::add('/ppdb/downloadbrosur', PPDBController::class, 'downloadBrosur');

Router::add('/admin/ppdb', PPDBController::class, 'PPDB');
Router::add('/admin/ppdb/edit/judul', PPDBController::class, 'editJudulPPDB');
Router::add('/admin/ppdb/edit/deskripsi', PPDBController::class, 'editDeskripsiPPDB');
Router::add('/admin/ppdb/edit/gambar', PPDBController::class, 'editGambarPPDB');
Router::add('/admin/ppdb/edit/brosur', PPDBController::class, 'editBrosurPPDB');

Router::add('/admin/ppdb/alur/tambah', PPDBController::class, 'tambahAlurPPDB');
Router::add('/admin/ppdb/alur/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', PPDBController::class, 'editAlurPPDB');
Router::add('/admin/ppdb/alur/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', PPDBController::class, 'deleteAlurPPDB');





// Rute untuk admin
Router::add('/admin', SlideshowController::class, 'index');
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

Router::add('/admin/kurikulum', KurikulumController::class, 'showKurikulumPagination');
Router::add('/admin/kurikulum/tambah', KurikulumController::class, 'tambahKurikulum');
Router::add('/admin/kurikulum/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', KurikulumController::class, 'editKurikulum');
Router::add('/admin/kurikulum/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', KurikulumController::class, 'deleteKurikulum');
Router::add('/admin/kurikulum/edit', KurikulumController::class, 'editKurikulum2');

Router::add('/admin/galeri', GaleriController::class, 'showGaleriPagination');
Router::add('/admin/galeri/tambah', GaleriController::class, 'tambahGaleri');
Router::add('/admin/galeri/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GaleriController::class, 'editGaleri');
Router::add('/admin/galeri/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', GaleriController::class, 'deleteGaleri');

Router::add('/admin/berita', BeritaController::class, 'showBeritaPagination');
Router::add('/admin/berita/tambah', BeritaController::class, 'tambahBerita');
Router::add('/admin/berita/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', BeritaController::class, 'editBerita');
Router::add('/admin/berita/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', BeritaController::class, 'deleteBerita');

Router::add('/admin/check-register', AdminController::class, 'showAdminPagination');
Router::add('/admin/check-register/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', AdminController::class, 'changeStatus');
Router::add('/admin/check-register/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', AdminController::class, 'deleteAdmin');
