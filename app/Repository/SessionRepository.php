<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use Rubygroup\WebProfileSekolah\Entity\Session;

class SessionRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Session $session): Session {
        $statement = $this->connection->prepare("INSERT INTO sessions (id, admin_id) VALUES (?,?)");
        $statement->execute([
            $session->getId(),
            $session->getAdminId()
        ]);
        return $session;
    }

    public function findById(string $id): ?Session {
        $statement = $this->connection->prepare("SELECT * FROM sessions WHERE id = ?");
        $statement->execute([$id]);

        try {
            if($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $session = new Session();
                $session->setId($row['id']);
                $session->setAdminId($row['admin_id']);
                return $session;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }



    public function deleteById(string $id): void {
        $this->connection->prepare("DELETE FROM sessions WHERE id = ?")->execute([$id]);
    }

    public function deleteAll(): void {
        $this->connection->exec("DELETE FROM sessions");
    }
}