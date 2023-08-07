<?php

namespace Rubygroup\WebProfileSekolah\Service;

use FPDF;
use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\AlurPPDB;
use Rubygroup\WebProfileSekolah\Entity\PPDB;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\PPDBRequest;
use Rubygroup\WebProfileSekolah\Repository\PPDBRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class PPDBService
{
    private PPDBRepository $ppdbRepository;
    private ValidationUtil $validationUtil;

    public function __construct(PPDBRepository $ppdbRepository)
    {
        $this->ppdbRepository = $ppdbRepository;
        $this->validationUtil = new ValidationUtil();
    }

    private function uploadPhoto(array $file, string $category): string
    {
        $targetDirectory = 'images/upload/ppdb/'; // Replace with the actual path
        $targetFileName = $category . '_' . uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getPPDB(): PPDB
    {
        $ppdb = $this->ppdbRepository->getPPDB();
        return $ppdb ? $ppdb : throw new ValidationException('PPDB Tidak Ditemukan');
    }

    public function updateJudulPPDB(PPDBRequest $request): PPDB
    {
        $ppdb = $this->ppdbRepository->getPPDB();
        if (!$ppdb) {
            throw new ValidationException("PPDB not found");
        }

        $ppdb->setJudul($request->judul);

        return $this->ppdbRepository->updatePPDB($ppdb);
    }

    public function updateDeskripsiPPDB(PPDBRequest $request): PPDB
    {
        $ppdb = $this->ppdbRepository->getPPDB();
        if (!$ppdb) {
            throw new ValidationException("PPDB not found");
        }

        $ppdb->setDeskripsi($request->deskripsi);

        return $this->ppdbRepository->updatePPDB($ppdb);
    }

    public function updateFotoPPDB(PPDBRequest $request): PPDB
    {
        $ppdb = $this->ppdbRepository->getPPDB();
        if (!$ppdb) {
            throw new ValidationException("PPDB not found");
        }

        if (!empty($request->foto['name'])){
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/ppdb/' . $ppdb->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $ppdb->setFoto($this->uploadPhoto($request->foto, 'foto'));
        }


        return $this->ppdbRepository->updatePPDB($ppdb);
    }

    public function updateBrosurPPDB(PPDBRequest $request): PPDB
    {
        $ppdb = $this->ppdbRepository->getPPDB();
        if (!$ppdb) {
            throw new ValidationException("PPDB not found");
        }

        if (!empty($request->brosur['name'])){
            $this->validationUtil->validateImageFile($request->brosur);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/ppdb/' . $ppdb->getBrosur(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $ppdb->setBrosur($this->uploadPhoto($request->brosur, 'brosur'));
        }

        return $this->ppdbRepository->updatePPDB($ppdb);
    }

    public function createAlurPPDB(PPDBRequest $request): AlurPPDB
    {
        $alurPPDB = new AlurPPDB();
        $alurPPDB->setIdAlurPPDB(Uuid::uuid4()->toString());
        $alurPPDB->setUrutan($request->urutan);
        $alurPPDB->setJudul($request->judul);
        $alurPPDB->setTanggal($request->tanggal);
        $alurPPDB->setIdPpdb($this->ppdbRepository->getPPDB()->getIdPPDB());

        return $this->ppdbRepository->saveAlurPPDB($alurPPDB);
    }

    public function updateAlurPPDB(string $id, PPDBRequest $request): AlurPPDB
    {
        $alurPPDB = $this->ppdbRepository->findAlurPPDBById($id);
        if (!$alurPPDB) {
            throw new ValidationException("Alur PPDB not found");
        }

        $alurPPDB->setUrutan($request->urutan);
        $alurPPDB->setJudul($request->judul);
        $alurPPDB->setTanggal($request->tanggal);

        return $this->ppdbRepository->updateAlurPPDB($alurPPDB);
    }

    public function deleteAlurPPDB(string $id): bool
    {
        $alurPPDB = $this->ppdbRepository->findAlurPPDBById($id);
        if (!$alurPPDB) {
            throw new ValidationException("Alur PPDB not found");
        }

        return $this->ppdbRepository->deleteAlurPPDB($alurPPDB->getIdAlurPpdb());
    }

    public function getAllAlurPPDB(): array
    {
        return $this->ppdbRepository->getAllAlurPPDB();
    }
}