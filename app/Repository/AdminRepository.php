<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use Rubygroup\WebProfileSekolah\Entity\Admin;
use Rubygroup\WebProfileSekolah\Entity\GuruStaff;


class AdminRepository
{
    private \PDO $connection;
    private GuruStaff $guruStaff;
    private GuruStaffRepository $guruStaffRepository;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Admin $admin): Admin{
        $statement = $this->connection->prepare('INSERT INTO admin (id, username, password, id_guru_staff) VALUES (?, ?, ?, ?)');
        $statement
            ->execute([
                $admin->getId(),
                $admin->getUsername(),
                $admin->getPassword(),
                $admin->getGuruStaff()->getIdGuruStaff()
            ]);
        return $admin;
    }

    public function findByUsername(string $username): ?Admin{
        $statement = $this->connection->prepare('SELECT * FROM admin WHERE username = ?');
        $statement->execute([$username]);

        try {
            $row = $statement->fetch();
            if (!$row) {
                return null;
            }
            $admin = new Admin();
            $admin->setId((string)$row['id']);
            $admin->setUsername((string)$row['username']);
            $admin->setPassword((string)$row['password']);
            $admin->setStatus((string)$row['status']);

            $this->guruStaffRepository = new GuruStaffRepository($this->connection);
            $this->guruStaff = $this->guruStaffRepository->findGuruStaffById((string)$row['id_guru_staff']);
            $admin->setGuruStaff($this->guruStaff);
            return $admin;
        } finally {
            $statement->closeCursor();
        }
    }

    public function findById(string $getAdminId) : ?Admin
    {
        $statement = $this->connection->prepare('SELECT * FROM admin WHERE id = ?');
        $statement->execute([$getAdminId]);

        try {
            $row = $statement->fetch();
            if (!$row) {
                return null;
            }
            $admin = new Admin();
            $admin->setId((string)$row['id']);
            $admin->setUsername((string)$row['username']);
            $admin->setPassword((string)$row['password']);
            $admin->setStatus((string)$row['status']);

            $this->guruStaffRepository = new GuruStaffRepository($this->connection);
            $this->guruStaff = $this->guruStaffRepository->findGuruStaffById((string)$row['id_guru_staff']);
            $admin->setGuruStaff($this->guruStaff);

            return $admin;
        } finally {
            $statement->closeCursor();
        }
    }

    // change password
    public function updatePassword(Admin $admin): Admin
    {
        $statement = $this->connection->prepare('UPDATE admin SET password = ? WHERE id = ?');
        $statement->execute([
            $admin->getPassword(),
            $admin->getId()
        ]);
        return $admin;
    }

    public function getAllAdmin(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM admin');
        $statement->execute();
        $admins = [];
        while ($row = $statement->fetch()) {
            $admin = new Admin();
            $admin->setId((string)$row['id']);
            $admin->setUsername((string)$row['username']);
            $admin->setPassword((string)$row['password']);
            $admin->setStatus((string)$row['status']);

            $this->guruStaffRepository = new GuruStaffRepository($this->connection);
            $this->guruStaff = $this->guruStaffRepository->findGuruStaffById((string)$row['id_guru_staff']);
            $admin->setGuruStaff($this->guruStaff);

            $admins[] = $admin;
        }
        return $admins;
    }

    public function getAllAdminPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM admin LIMIT ? OFFSET ?');
        $statement->bindValue(1, $limit, \PDO::PARAM_INT);
        $statement->bindValue(2, $offset, \PDO::PARAM_INT);
        $statement->execute();
        $admins = [];
        while ($row = $statement->fetch()) {
            $admin = new Admin();
            $admin->setId((string)$row['id']);
            $admin->setUsername((string)$row['username']);
            $admin->setPassword((string)$row['password']);
            $admin->setStatus((string)$row['status']);

            $this->guruStaffRepository = new GuruStaffRepository($this->connection);
            $this->guruStaff = $this->guruStaffRepository->findGuruStaffById((string)$row['id_guru_staff']);
            $admin->setGuruStaff($this->guruStaff);

            $admins[] = $admin;
        }
        return $admins;
    }

    public function changeStatus(Admin $admin): Admin
    {
        $statement = $this->connection->prepare('UPDATE admin SET status = ? WHERE id = ?');
        $statement->execute([
            $admin->getStatus(),
            $admin->getId()
        ]);
        return $admin;
    }

    public function deleteAdmin(string $id): bool
    {
        $statement = $this->connection->prepare('DELETE FROM admin WHERE id = ?');
        $statement->execute([$id]);
        return $statement->rowCount() > 0;
    }
}