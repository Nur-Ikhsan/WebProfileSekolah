<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Service\SessionService;
use Rubygroup\WebProfileSekolah\Service\KetSekolahService;

class KetSekolahController
{
    private KetSekolahService $ketSekolahService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $ketSekolahRepository = new KetSekolahRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $this->ketSekolahService = new KetSekolahService($ketSekolahRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function visiMisi(): void
    {
        $admin = $this->sessionService->findSession();

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        try {
            $visiMisi = $this->ketSekolahService->getVisiMisi();
        } catch (ValidationException $e) {
            $visiMisi = null;
        }

        View::render('Admin/Sekolah/visi-misi', [
            'title' => 'Visi dan Misi',
            'visiMisi' => $visiMisi,
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ]
        ]);
    }

    public function editVisiMisi(): void
    {
        $admin = $this->sessionService->findSession();
        $visiMisi = $this->ketSekolahService->getVisiMisi();
        $title = null;
        $message = null;
        $error = null;

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visiMisi->setVisi($_POST['visi']);
            $visiMisi->setMisi($_POST['misi']);
            try {
                $this->ketSekolahService->updateVisiMisi($visiMisi);
                $title = 'Data Berhasil Tersimpan';
                $message = 'Selamat data sekolah berhasil diperbarui';
            } catch (ValidationException $e) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $e->getMessage();
            }
        }

        View::render('Admin/Sekolah/edit-visi-misi', [
            'title' => 'Edit Visi dan Misi',
            'visiMisi' => $visiMisi,
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ],
            'message' => [
                'title' => $title,
                'description' => $message,
                'error' => $error
            ]
        ]);
    }

    public function strukturOrganisasi(): void
    {
        $admin = $this->sessionService->findSession();

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        try {
            $strukturOrganisasi = $this->ketSekolahService->getStrukturOrganisasi();
        } catch (ValidationException $e) {
            $strukturOrganisasi = null;
        }

        View::render('Admin/Sekolah/struktur-organisasi', [
            'title' => 'Struktur Organisasi',
            'strukturOrganisasi' => $strukturOrganisasi,
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ]
        ]);
    }

    public function editStrukturOrganisasi(): void
    {
        $admin = $this->sessionService->findSession();
        $strukturOrganisasi = $this->ketSekolahService->getStrukturOrganisasi();
        $request = [];
        $title = null;
        $message = null;
        $error = null;

        if ($admin === null) {
            View::redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = $_FILES['foto'];
            try {
                $this->ketSekolahService->updateStrukturOrganisasi($strukturOrganisasi->getId(), $request);
                $title = 'Data Berhasil Tersimpan';
                $message = 'Selamat data Struktur Organisasi berhasil diperbarui';
            } catch (ValidationException $e) {
                $title = 'Data Gagal Tersimpan';
                $message = 'Silakan coba lagi untuk menyelesaikan permintaan';
                $error = $e->getMessage();
            }
        }

        View::render('Admin/Sekolah/edit-struktur-organisasi', [
            'title' => 'Edit Struktur Organisasi',
            'strukturOrganisasi' => $strukturOrganisasi,
            'admin' => [
                'id' => $admin->getId(),
                'username' => $admin->getUsername(),
                'nama' => $admin->getGuruStaff()->getNamaGuru(),
                'jabatan' => $admin->getGuruStaff()->getJabatan(),
                'foto' => $admin->getGuruStaff()->getFoto()
            ],
            'message' => [
                'title' => $title,
                'description' => $message,
                'error' => $error
            ]
        ]);
    }
}