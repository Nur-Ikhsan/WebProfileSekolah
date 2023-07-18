<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Ramsey\Uuid\Uuid;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Admin;
use Rubygroup\WebProfileSekolah\Model\AdminRequest;
use Rubygroup\WebProfileSekolah\Model\AdminResponse;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;

class AdminService
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function register(AdminRequest $request): AdminResponse
    {
        $this->validate($request);

        try {
            Database::beginTransaction();
            $admin = $this->adminRepository->findByUsername($request->username);
            if ($admin !== null) {
                throw new ValidationException('Username already exist');
            }

            $admin = new Admin();

            $admin->setId(Uuid::uuid4()->toString());
            $admin->setUsername($request->username);
            $admin->setPassword(password_hash($request->password, PASSWORD_BCRYPT));
            $admin->setGuruStaff($request->guruStaff);

            $this->adminRepository->save($admin);

            $response = new AdminResponse();
            $response->username = $admin->getUsername();
            $response->password = $admin->getPassword();
            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw new ValidationException('Guru/Staff already exist');
        }
    }

    private function validate(AdminRequest $request): void
    {
        if ($request->username === null || $request->password == null || trim($request->password) == "" || trim($request->username) == "") {
            throw new ValidationException('Username and Password is required');
        }
    }

    public function login(AdminRequest $request): AdminResponse
    {
        $this->validate($request);

        try {
            Database::beginTransaction();
            $admin = $this->adminRepository->findByUsername($request->username);
            if ($admin === null) {
                throw new ValidationException('Username not found');
            }

            if (!password_verify($request->password, $admin->getPassword())) {
                throw new ValidationException('Password not match');
            }

            if ($admin->getStatus() === 'NON-ACTIVE') {
                throw new ValidationException('Admin is not active');
            }


            $response = new AdminResponse();
            $response->id = $admin->getId();
            $response->username = $admin->getUsername();
            $response->password = $admin->getPassword();
            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function gantiPassword(string $username, string $oldPassword, string $newPassword, string $confirmNewPassword): void
    {
        $admin = $this->adminRepository->findByUsername($username);

        if (!$admin) {
            throw new ValidationException('Admin not found.');
        }

        // Pengecekan password lama
        if (!password_verify($oldPassword, $admin->getPassword())) {
            throw new ValidationException('Old password is incorrect.');
        }

        // Pengecekan kesamaan password baru dan konfirmasi password baru
        if ($newPassword !== $confirmNewPassword) {
            throw new ValidationException('New password and confirm password do not match.');
        }

        // Enkripsi password baru
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password di repository
        $admin->setPassword($hashedPassword);
        $this->adminRepository->updatePassword($admin);
    }

    public function getAllAdmin(): array
    {
        return $this->adminRepository->getAllAdmin();
    }

    public function getAdminAdminPagination(int $page, int $perPage): array
    {
        $offset = ($page - 1) * $perPage;
        return $this->adminRepository->getAllAdminPagination($perPage, $offset);
    }

    public function changeStatus(string $id, string $status, Admin $nowAdmin): Admin
    {
        $admin = $this->adminRepository->findById($id);

        if ($admin->getId() === $nowAdmin->getId()) {
            throw new ValidationException('Tidak dapat mengubah status admin sendiri');
        }

        if (!$admin) {
            throw new ValidationException('Prestasi tidak ditemukan');
        }

        $admin->setStatus($status);
        return $this->adminRepository->changeStatus($admin);
    }

    public function deleteAdmin(string $id, Admin $nowAdmin): void
    {
        $admin = $this->adminRepository->findById($id);

        if ($admin->getId() === $nowAdmin->getId()) {
            throw new ValidationException('Tidak dapat menghapus admin sendiri');
        }

        if (!$admin) {
            throw new ValidationException('Admin tidak ditemukan');
        }

        $this->adminRepository->deleteAdmin($admin->getId());
    }
}