<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\GuruStaff;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\GuruStaffRequest;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;
use Rubygroup\WebProfileSekolah\Validation\ValidationUtil;

class GuruStaffService
{
    private GuruStaffRepository $guruStaffRepository;
    private ValidationUtil $validationUtil;

    public function __construct(GuruStaffRepository $guruStaffRepository)
    {
        $this->guruStaffRepository = $guruStaffRepository;
        $this->validationUtil = new ValidationUtil();
    }

    public function createGuruStaff(GuruStaffRequest $request): GuruStaff
    {
        $this->validationUtil->validateImageFile($request->foto);

        $guruStaff = new GuruStaff();
        $guruStaff->setIdGuruStaff(Uuid::uuid4()->toString());
        $guruStaff->setNamaGuru($request->namaGuru);
        $guruStaff->setJabatan($request->jabatan);
        $guruStaff->setFoto($this->uploadPhoto($request->foto));

        return $this->guruStaffRepository->saveGuruStaff($guruStaff);
    }

    public function getGuruStaffById(string $id): GuruStaff
    {
        $guruStaff = $this->guruStaffRepository->findGuruStaffById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        return $guruStaff;
    }

    public function updateGuruStaff(string $id, GuruStaffRequest $request): GuruStaff
    {


        $guruStaff = $this->guruStaffRepository->findGuruStaffById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        if (!empty($request->foto['name'])){
            $this->validationUtil->validateImageFile($request->foto);
            // Menghapus file foto dari direktori
            $filePath = 'images/upload/guru-staff/' . $guruStaff->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $guruStaff->setFoto($this->uploadPhoto($request->foto));
        }
        $guruStaff->setNamaGuru($request->namaGuru);
        $guruStaff->setJabatan($request->jabatan);

        return $this->guruStaffRepository->updateGuruStaff($guruStaff);
    }

    public function deleteGuruStaff(string $id): bool
    {
        $guruStaff = $this->guruStaffRepository->findGuruStaffById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/guru-staff/' . $guruStaff->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->guruStaffRepository->deleteGuruStaff($guruStaff);
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/guru-staff/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
    $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getAllGuruStaff(): array
    {
        return $this->guruStaffRepository->getAllGuruStaff();
    }

    public function getAllGuruStaffPagination($page, $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->guruStaffRepository->getAllGuruStaffPagination($perPage, $offset);
    }
}