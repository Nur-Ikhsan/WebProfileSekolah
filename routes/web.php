<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubygroup\WebProfileSekolah\App\Router;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Controller\HomeController;
use Rubygroup\WebProfileSekolah\Controller\AdminController;
use Rubygroup\WebProfileSekolah\Controller\SlideshowController;

Database::getConnection('production');

// Rute untuk halaman Web Profile Sekolah
Router::add('/', HomeController::class, 'index');
Router::add('/index', HomeController::class, 'index');
Router::add('/berita', HomeController::class, 'berita');
Router::add('/visi-misi', HomeController::class, 'visiMisi');
Router::add('/tujuan', HomeController::class, 'tujuan');
Router::add('/kurikulum', HomeController::class, 'kurikulum');


// Rute untuk admin
Router::add('/admin', AdminController::class, 'index');
Router::add('/admin/', AdminController::class, 'index');
Router::add('/admin/index', AdminController::class, 'index');
Router::add('/admin/register', AdminController::class, 'register');
Router::add('/admin/login', AdminController::class, 'login');
Router::add('/admin/logout', AdminController::class, 'logout');
Router::add('/admin/profile', AdminController::class, 'editProfile');
Router::add('/admin/password', AdminController::class, 'changePassword');

Router::add('/admin/k/k', AdminController::class, 'k');

Router::add('/admin/slideshow/upload', SlideshowController::class, 'uploadSlideshow');
Router::add('/admin/slideshow', SlideshowController::class, 'viewAllSlideshows');
Router::add('/admin/slideshow/delete/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', SlideshowController::class, 'delete');
Router::add('/admin/slideshow/edit/([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})', SlideshowController::class, 'edit');
