<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use Rubygroup\WebProfileSekolah\Entity\Admin;

class AdminRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Admin $admin): Admin{
        $statement = $this->connection->prepare('INSERT INTO admin (username, password) VALUES (?, ?)');
        $statement
            ->execute([
                $admin->getUsername(),
                $admin->getPassword()
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
            $admin->setId((int)$row['id']);
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

    public function findById(int $getAdminId)
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
            return $admin;
        } finally {
            $statement->closeCursor();
        }
    }
}