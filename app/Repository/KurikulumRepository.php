<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Kurikulum;

class KurikulumRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveKurikulum(Kurikulum $kurikulum): Kurikulum
    {
        $statement = $this->connection->prepare('INSERT INTO kurikulum (id_kurikulum, komponen, sub_komponen, kategori) VALUES (?, ?, ?, ?)');
        $statement->execute([
            $kurikulum->getId(),
            $kurikulum->getKomponen(),
            $kurikulum->getSubKomponen(),
            $kurikulum->getKategori()
        ]);

        return $kurikulum;
    }

    public function findKurikulumById(string $id): ?Kurikulum
    {
        $statement = $this->connection->prepare('SELECT * FROM kurikulum WHERE id_kurikulum = ?');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $kurikulum = new Kurikulum();
        $kurikulum->setId((string)$row['id_kurikulum']);
        $kurikulum->setKomponen((string)$row['komponen']);
        $kurikulum->setSubKomponen((string)$row['sub_komponen']);
        $kurikulum->setKategori((string)$row['kategori']);

        return $kurikulum;
    }

    public function updateKurikulum(Kurikulum $kurikulum): Kurikulum
    {
        $statement = $this->connection->prepare('UPDATE kurikulum SET komponen = ?, sub_komponen = ?, kategori = ? WHERE id_kurikulum = ?');
        $statement->execute([
            $kurikulum->getKomponen(),
            $kurikulum->getSubKomponen(),
            $kurikulum->getKategori(),
            $kurikulum->getId()
        ]);

        return $kurikulum;
    }

    public function deleteKurikulum(Kurikulum $kurikulum): bool
    {
        $statement = $this->connection->prepare('DELETE FROM kurikulum WHERE id_kurikulum = ?');
        $statement->execute([$kurikulum->getId()]);

        return $statement->rowCount() > 0;
    }

    public function getAllKurikulum(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kurikulum  ORDER BY FIELD(kategori, "Kelompok A", "Kelompok B", "Muatan Lokal", "Bimbingan dan Pelayanan", "Pengembangan Diri")');
        $statement->execute();

        $rows = $statement->fetchAll();
        $kurikulums = [];
        foreach ($rows as $row) {
            $kurikulum = new Kurikulum();
            $kurikulum->setId((string)$row['id_kurikulum']);
            $kurikulum->setKomponen((string)$row['komponen']);
            $kurikulum->setSubKomponen((string)$row['sub_komponen']);
            $kurikulum->setKategori((string)$row['kategori']);
            $kurikulums[] = $kurikulum;
        }

        return $kurikulums;
    }

    public function getAllKurikulumPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kurikulum  ORDER BY FIELD(kategori, "Kelompok A", "Kelompok B", "Muatan Lokal", "Bimbingan dan Pelayanan", "Pengembangan Diri") LIMIT ? OFFSET ?');
        $statement->bindValue(1, $limit, PDO::PARAM_INT);
        $statement->bindValue(2, $offset, PDO::PARAM_INT);
        $statement->execute();

        $rows = $statement->fetchAll();
        $kurikulums = [];
        foreach ($rows as $row) {
            $kurikulum = new Kurikulum();
            $kurikulum->setId((string)$row['id_kurikulum']);
            $kurikulum->setKomponen((string)$row['komponen']);
            $kurikulum->setSubKomponen((string)$row['sub_komponen']);
            $kurikulum->setKategori((string)$row['kategori']);
            $kurikulums[] = $kurikulum;
        }

        return $kurikulums;
    }
}