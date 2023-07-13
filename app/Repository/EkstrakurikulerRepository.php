<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Ekstrakurikuler;

class EkstrakurikulerRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveEkstrakurikuler(Ekstrakurikuler $ekstrakurikuler): Ekstrakurikuler
    {
        $statement = $this->connection->prepare("INSERT INTO ekstrakurikuler (id_ekstrakurikuler, nama_ekstrakurikuler, deskripsi, icon) VALUES (?, ?, ?, ?)");
        $statement->execute([
            $ekstrakurikuler->getIdEkstrakurikuler(),
            $ekstrakurikuler->getNamaEkstrakurikuler(),
            $ekstrakurikuler->getDeskripsi(),
            $ekstrakurikuler->getIcon()
        ]);

        return $ekstrakurikuler;
    }

    public function updateEkstrakurikuler(Ekstrakurikuler $ekstrakurikuler): Ekstrakurikuler
    {
        $statement = $this->connection->prepare("UPDATE ekstrakurikuler SET nama_ekstrakurikuler = ?, deskripsi = ?, icon = ? WHERE id_ekstrakurikuler = ?");
        $statement->execute([
            $ekstrakurikuler->getNamaEkstrakurikuler(),
            $ekstrakurikuler->getDeskripsi(),
            $ekstrakurikuler->getIcon(),
            $ekstrakurikuler->getIdEkstrakurikuler()
        ]);

        return $ekstrakurikuler;
    }

    public function getAllEkstrakurikulerPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM ekstrakurikuler ORDER BY nama_ekstrakurikuler LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $ekstrakurikulers = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $ekstrakurikuler = new Ekstrakurikuler();
            $ekstrakurikuler->setIdEkstrakurikuler($row['id_ekstrakurikuler']);
            $ekstrakurikuler->setNamaEkstrakurikuler($row['nama_ekstrakurikuler']);
            $ekstrakurikuler->setDeskripsi($row['deskripsi']);
            $ekstrakurikuler->setIcon($row['icon']);

            $ekstrakurikulers[] = $ekstrakurikuler;
        }

        return $ekstrakurikulers;
    }

    public function deleteEkstrakurikuler(Ekstrakurikuler $ekstrakurikuler): bool
    {
        $statement = $this->connection->prepare('DELETE FROM ekstrakurikuler WHERE id_ekstrakurikuler = ?');
        $statement->execute([$ekstrakurikuler->getIdEkstrakurikuler()]);

        return $statement->rowCount() > 0;
    }

    public function findEkstrakurikulerById(string $id): ?Ekstrakurikuler
    {
        $statement = $this->connection->prepare('SELECT * FROM ekstrakurikuler WHERE id_ekstrakurikuler = ?');
        $statement->execute([$id]);

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->setIdEkstrakurikuler($row['id_ekstrakurikuler']);
        $ekstrakurikuler->setNamaEkstrakurikuler($row['nama_ekstrakurikuler']);
        $ekstrakurikuler->setDeskripsi($row['deskripsi']);
        $ekstrakurikuler->setIcon($row['icon']);

        return $ekstrakurikuler;
    }

    public function getAllEkstrakurikuler(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM ekstrakurikuler ORDER BY nama_ekstrakurikuler');
        $statement->execute();

        $ekstrakurikulers = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $ekstrakurikuler = new Ekstrakurikuler();
            $ekstrakurikuler->setIdEkstrakurikuler($row['id_ekstrakurikuler']);
            $ekstrakurikuler->setNamaEkstrakurikuler($row['nama_ekstrakurikuler']);
            $ekstrakurikuler->setDeskripsi($row['deskripsi']);
            $ekstrakurikuler->setIcon($row['icon']);

            $ekstrakurikulers[] = $ekstrakurikuler;
        }

        return $ekstrakurikulers;
    }
}