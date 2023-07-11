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
            return $admin;
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void{
        $this->connection->exec('DELETE FROM admin');
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
            $admin->setId((int)$row['id']);
            $admin->setUsername((string)$row['username']);
            $admin->setPassword((string)$row['password']);

            $this->guruStaffRepository = new GuruStaffRepository($this->connection);
            $this->guruStaff = $this->guruStaffRepository->findById((string)$row['id_guru_staff']);
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
}