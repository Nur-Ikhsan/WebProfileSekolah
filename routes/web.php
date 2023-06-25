<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubygroup\WebProfileSekolah\App\Router;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Controller\HomeController;
use Rubygroup\WebProfileSekolah\Controller\AdminController;

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
Router::add('/admin/register', AdminController::class, 'register');
Router::add('/admin/login', AdminController::class, 'login');
Router::add('/admin/dashboard', AdminController::class, 'dashboard');
Router::add('/admin/logout', AdminController::class, 'logout');
Router::add('/admin/profile', AdminController::class, 'editProfile');
Router::add('/admin/password', AdminController::class, 'changePassword');

Router::add('/admin/k/k', AdminController::class, 'k');
