<?php

namespace Rubygroup\WebProfileSekolah\Controller;

use Rubygroup\WebProfileSekolah\App\View;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\PPDBRequest;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\PPDBRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;
use Rubygroup\WebProfileSekolah\Service\PPDBService;
use Rubygroup\WebProfileSekolah\Service\SessionService;

class PPDBController
{
    private PPDBService $ppdbService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $ppdbRepository = new PPDBRepository($connection);
        $this->ppdbService = new PPDBService($ppdbRepository);

        $adminRepository = new AdminRepository($connection);
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function index()
    {
        $ppdb = $this->ppdbService->getPPDB();
        $alurPPDBList = $this->ppdbService->getAllAlurPPDB();
        View::renderHome('ppdb',[
                'title' => 'Penerimaan Peserta Didik Baru Madrasah Tsanawiyah Negeri 2 Sambas ',
                'ppdb' => $ppdb,
                'alurPPDBList' => $alurPPDBList
            ]
        );
    }

    public function downloadBrosur(){

        $ppdb = $this->ppdbService->getPPDB();
        if (!$ppdb) {
            throw new ValidationException("PPDB not found");
        }
        $filePath = 'images/upload/ppdb/' . $ppdb->getBrosur(); // Ganti dengan path direktori tempat menyimpan foto

        $filename = $ppdb->getBrosur();
        header('Content-type: images/*');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($filePath);
    }

    public function PPDB($title = null, $message = null, $error = null){
        $ppdb = $this->ppdbService->getPPDB();
        $alurPPDBList = $this->ppdbService->getAllAlurPPDB();
        $admin = $this->sessionService->findSession();

        if ($admin === null) {
            View::redirect('/admin/login');
            return;
        }

        View::render('Admin/PPDB/ppdb',[
                'title' => 'Penerimaan Peserta Didik Baru Madrasah Tsanawiyah Negeri 2 Sambas ',
                'admin' => [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'nama' => $admin->getGuruStaff()->getNamaGuru(),
                    'jabatan' => $admin->getGuruStaff()->getJabatan(),
                    'foto' => $admin->getGuruStaff()->getFoto()
                ],
                'ppdb' => $ppdb,
                'alurPPDBList' => $alurPPDBList,
                'message' => [
                    'title' => $title,
                    'description' => $message,
                    'error' => $error
                ]
            ]
        );
    }

    public function editJudulPPDB(){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->judul = ($_POST['judul']);

            try {
                $this->ppdbService->updateJudulPPDB($request);
                $title = 'Berhasil';
                $message = 'Judul PPDB berhasil diubah';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Judul PPDB gagal diubah';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function editDeskripsiPPDB(){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->deskripsi = ($_POST['deskripsi']);

            try {
                $this->ppdbService->updateDeskripsiPPDB($request);
                $title = 'Berhasil';
                $message = 'Deskripsi PPDB berhasil diubah';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Deskripsi PPDB gagal diubah';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function editGambarPPDB(){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->foto = $_FILES['foto'];

            try {
                $this->ppdbService->updateFotoPPDB($request);
                $title = 'Berhasil';
                $message = 'Gambar PPDB berhasil diubah';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Gambar PPDB gagal diubah';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function editBrosurPPDB(){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->brosur = ($_FILES['brosur']);

            try {
                $this->ppdbService->updateBrosurPPDB($request);
                $title = 'Berhasil';
                $message = 'Brosur PPDB berhasil diubah';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Brosur PPDB gagal diubah';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function tambahAlurPPDB(){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->urutan = ($_POST['urutan']);
            $request->judul = ($_POST['judul']);
            $request->tanggal = ($_POST['tanggal']);

            try {
                $this->ppdbService->createAlurPPDB($request);
                $title = 'Berhasil';
                $message = 'Alur PPDB berhasil ditambahkan';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Alur PPDB gagal ditambahkan';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function editAlurPPDB(string $id){
        $request = new PPDBRequest();
        $title = null;
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request->urutan = ($_POST['urutan']);
            $request->judul = ($_POST['judul']);
            $request->tanggal = ($_POST['tanggal']);

            try {
                $this->ppdbService->updateAlurPPDB($id, $request);
                $title = 'Berhasil';
                $message = 'Alur PPDB berhasil diubah';
            } catch (ValidationException $e) {
                $title = 'Gagal';
                $message = 'Alur PPDB gagal diubah';
                $error = $e->getMessage();
            }
        }
        $this->PPDB($title, $message, $error);
    }

    public function deleteAlurPPDB(string $id){
        $title = null;
        $message = null;
        $error = null;

        try {
            $this->ppdbService->deleteAlurPPDB($id);
            $title = 'Berhasil';
            $message = 'Alur PPDB berhasil dihapus';
        } catch (ValidationException $e) {
            $title = 'Gagal';
            $message = 'Alur PPDB gagal dihapus';
            $error = $e->getMessage();
        }
        $this->PPDB($title, $message, $error);
    }
}