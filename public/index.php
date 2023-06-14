<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubygroup\WebProfileSekolah\App\Router;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Controller\HomeController;
use Rubygroup\WebProfileSekolah\Controller\ProductController;
use Rubygroup\WebProfileSekolah\Controller\AdminController;
use Rubygroup\WebProfileSekolah\Middleware\AuthMiddleware;

Database::getConnection('production');

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/index', HomeController::class, 'index');
Router::add('GET', '/berita', HomeController::class, 'berita');
Router::add('GET', '/visi-misi', HomeController::class, 'visiMisi');

Router::add('GET', '/product/([0-9a-zA-Z]*)/category/([0-9a-zA-Z]*)', ProductController::class, 'category');

Router::add('GET', '/admin', AdminController::class, 'index');
Router::add('GET', '/admin/register', AdminController::class, 'register');
Router::add('POST', '/admin/register', AdminController::class, 'register');
Router::add('GET', '/admin/login', AdminController::class, 'login');
Router::add('POST', '/admin/login', AdminController::class, 'login');
Router::add('GET', '/admin/dashboard', AdminController::class, 'dashboard');
Router::add('GET', '/admin/logout', AdminController::class, 'logout');
Router::add('GET', '/admin/profile', AdminController::class, 'editProfile');
Router::add('POST', '/admin/profile', AdminController::class, 'editProfile');
Router::add('GET', '/admin/password', AdminController::class, 'changePassword');
Router::add('POST', '/admin/password', AdminController::class, 'changePassword');

Router::run();