<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Rubygroup\WebProfileSekolah\Entity\KetSekolah;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Repository\KetSekolahRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class KetSekolahService
{
    private KetSekolahRepository $visiMisiRepository;
    private ValidationUtil $validationUtil;

    public function __construct(KetSekolahRepository $visiMisiRepository)
    {
        $this->visiMisiRepository = $visiMisiRepository;
        $this->validationUtil = new ValidationUtil();
    }

    public function getVisiMisi(): KetSekolah
    {
        if ($this->visiMisiRepository->getVisiMisi()) {
            return $this->visiMisiRepository->getVisiMisi();
        } else {
            throw new ValidationException('Visi dan Misi Tidak Ditemukan');
        }
    }

    public function updateVisiMisi(KetSekolah $visiMisi): KetSekolah
    {
        return $this->visiMisiRepository->updateVisiMisi($visiMisi);
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/struktur-organisasi/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getStrukturOrganisasi(): KetSekolah
    {
        if ($this->visiMisiRepository->getStrukturOrganisasi()) {
            return $this->visiMisiRepository->getStrukturOrganisasi();
        } else {
            throw new ValidationException('Struktur Organisasi Tidak Ditemukan');
        }
    }

    public function updateStrukturOrganisasi(string $id, array $request): KetSekolah
    {
        $this->validationUtil->validateImageFile($request);

        $strukturOrganisasi = $this->visiMisiRepository->getStrukturOrganisasi();

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/struktur-organisasi/' . $strukturOrganisasi->getStrukturOrganisasi(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $strukturOrganisasi->setStrukturOrganisasi($this->uploadPhoto($request));
        return $this->visiMisiRepository->updateStrukturOrganisasi($strukturOrganisasi);
    }

    public function getKurikulum():KetSekolah
    {
        if ($this->visiMisiRepository->getKurikulum()) {
            return $this->visiMisiRepository->getKurikulum();
        } else {
            throw new ValidationException('Kurikulum Tidak Ditemukan');
        }
    }

    public function updateKurikulum(KetSekolah $kurikulum): KetSekolah
    {
        return $this->visiMisiRepository->updateKurikulum($kurikulum);
    }

}