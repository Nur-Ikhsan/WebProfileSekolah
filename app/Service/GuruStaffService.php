<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Entity\GuruStaff;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;
use Rubygroup\WebProfileSekolah\Model\GuruStaffRequest;
use Rubygroup\WebProfileSekolah\Model\GuruStaffResponse;
use Rubygroup\WebProfileSekolah\Repository\GuruStaffRepository;

class GuruStaffService
{
    private GuruStaffRepository $guruStaffRepository;

    public function __construct(GuruStaffRepository $guruStaffRepository)
    {
        $this->guruStaffRepository = $guruStaffRepository;
    }

    private function validateImageFile(array $file): void
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        $fileName = $file['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (empty($fileName)) {
            throw new ValidationException('Tidak ada perubahan, File gambar tidak boleh kosong.');
        }

        if ($file['size'] > 1000000) {
            throw new ValidationException('Ukuran file gambar tidak boleh lebih dari 1MB.');
        }

        if ($file['error'] !== 0) {
            throw new ValidationException('File gambar tidak valid.');
        }

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new ValidationException('File gambar tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.');
        }
    }

    public function createGuruStaff(GuruStaffRequest $request): GuruStaffResponse
    {
        $this->validateImageFile($request->foto);

        $guruStaff = new GuruStaff();
        $guruStaff->setIdGuruStaff(Uuid::uuid4()->toString());
        $guruStaff->setNamaGuru($request->namaGuru);
        $guruStaff->setJabatan($request->jabatan);
        $guruStaff->setFoto($this->uploadPhoto($request->foto));

        $savedGuruStaff = $this->guruStaffRepository->save($guruStaff);

        return new GuruStaffResponse($savedGuruStaff);
    }

    public function getGuruStaffById(string $id): GuruStaff
    {
        $guruStaff = $this->guruStaffRepository->findById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        return $guruStaff;
    }

    public function updateGuruStaff(string $id, GuruStaffRequest $request): GuruStaffResponse
    {
        $this->validateImageFile($request->foto);

        $guruStaff = $this->guruStaffRepository->findById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/guru_staff/' . $guruStaff->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $guruStaff->setNamaGuru($request->namaGuru);
        $guruStaff->setJabatan($request->jabatan);
        if ($request->foto !== null) {
            $this->validateImageFile($request->foto);
            $guruStaff->setFoto($this->uploadPhoto($request->foto));
        }

        $updatedGuruStaff = $this->guruStaffRepository->update($guruStaff);

        return new GuruStaffResponse($updatedGuruStaff);
    }

    public function deleteGuruStaff(string $id): bool
    {
        $guruStaff = $this->guruStaffRepository->findById($id);
        if ($guruStaff === null) {
            throw new ValidationException('Guru & Staff tidak ditemukan.');
        }

        // Menghapus file foto dari direktori
        $filePath = 'images/upload/guru_staff/' . $guruStaff->getFoto(); // Ganti dengan path direktori tempat menyimpan foto
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return $this->guruStaffRepository->delete($guruStaff);
    }

    private function uploadPhoto(array $file): string
    {
        $targetDirectory = 'images/upload/guru_staff/'; // Replace with the actual path
        $targetFileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $targetFileName;

        move_uploaded_file($file['tmp_name'], $targetFilePath);

        return $targetFileName;
    }

    public function getAllGuruStaff()
    {
        return $this->guruStaffRepository->getAll();
    }
}
