<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Kegiatan;

class KegiatanRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveKegiatan(Kegiatan $kegiatan): Kegiatan
    {
        $statement = $this->connection->prepare('INSERT INTO kegiatan (id_kegiatan, nama_kegiatan, deskripsi) VALUES (?, ?, ?)');
        $statement
            ->execute([
                $kegiatan->getIdKegiatan(),
                $kegiatan->getNamaKegiatan(),
                $kegiatan->getDeskripsi()
            ]);
        return $kegiatan;
    }

    public function findKegiatanById(string $getKegiatanId) : ?Kegiatan
    {
        $statement = $this->connection->prepare('SELECT * FROM kegiatan WHERE id_kegiatan = ?');
        $statement->execute([$getKegiatanId]);

        try {
            $row = $statement->fetch();
            if (!$row) {
                return null;
            }
            $kegiatan = new Kegiatan();
            $kegiatan->setIdKegiatan((string)$row['id_kegiatan']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            return $kegiatan;
        } finally {
            $statement->closeCursor();
        }
    }

    public function updateKegiatan(Kegiatan $kegiatan): Kegiatan
    {
        $statement = $this->connection->prepare('UPDATE kegiatan SET nama_kegiatan = ?, deskripsi = ? WHERE id_kegiatan = ?');
        $statement->execute([
            $kegiatan->getNamaKegiatan(),
            $kegiatan->getDeskripsi(),
            $kegiatan->getIdKegiatan()
        ]);

        return $kegiatan;
    }

    public function getAllKegiatan(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kegiatan');
        $statement->execute();

        $kegiatanList = [];
        while ($row = $statement->fetch()) {
            $kegiatan = new Kegiatan();
            $kegiatan->setIdKegiatan((string)$row['id_kegiatan']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            $kegiatanList[] = $kegiatan;
        }
        return $kegiatanList;
    }

    public function getAllKegiatanPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kegiatan LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $kegiatanList = [];
        while ($row = $statement->fetch()) {
            $kegiatan = new Kegiatan();
            $kegiatan->setIdKegiatan((string)$row['id_kegiatan']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            $kegiatanList[] = $kegiatan;
        }
        return $kegiatanList;
    }

    public function deleteKegiatan(string $idKegiatan): bool
    {
        $statement = $this->connection->prepare('DELETE FROM kegiatan WHERE id_kegiatan = ?');
        $statement->execute([$idKegiatan]);

        return $statement->rowCount() > 0;
    }

}