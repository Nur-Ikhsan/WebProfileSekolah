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
        $statement = $this->connection->prepare('INSERT INTO kegiatan (id_kegiatan, tanggal, nama_kegiatan, deskripsi, foto) VALUES (?, ?, ?, ?,?)');
        $statement
            ->execute([
                $kegiatan->getIdKegiatan(),
                $kegiatan->getTanggal(),
                $kegiatan->getNamaKegiatan(),
                $kegiatan->getDeskripsi(),
                $kegiatan->getFoto()
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
            $kegiatan->setTanggal((string)$row['tanggal']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            $kegiatan->setFoto((string)$row['foto']);
            return $kegiatan;
        } finally {
            $statement->closeCursor();
        }
    }

    public function updateKegiatan(Kegiatan $kegiatan): Kegiatan
    {
        $statement = $this->connection->prepare('UPDATE kegiatan SET tanggal = ?, nama_kegiatan = ?, deskripsi = ?, foto = ? WHERE id_kegiatan = ?');
        $statement->execute([
            $kegiatan->getTanggal(),
            $kegiatan->getNamaKegiatan(),
            $kegiatan->getDeskripsi(),
            $kegiatan->getFoto(),
            $kegiatan->getIdKegiatan()
        ]);

        return $kegiatan;
    }

    public function getAllKegiatan(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kegiatan ORDER BY tanggal');
        $statement->execute();

        $kegiatanList = [];
        while ($row = $statement->fetch()) {
            $kegiatan = new Kegiatan();
            $kegiatan->setIdKegiatan((string)$row['id_kegiatan']);
            $kegiatan->setTanggal((string)$row['tanggal']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            $kegiatan->setFoto((string)$row['foto']);
            $kegiatanList[] = $kegiatan;
        }
        return $kegiatanList;
    }

    public function getAllKegiatanPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM kegiatan ORDER BY tanggal LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $kegiatanList = [];
        while ($row = $statement->fetch()) {
            $kegiatan = new Kegiatan();
            $kegiatan->setIdKegiatan((string)$row['id_kegiatan']);
            $kegiatan->setTanggal((string)$row['tanggal']);
            $kegiatan->setNamaKegiatan((string)$row['nama_kegiatan']);
            $kegiatan->setDeskripsi((string)$row['deskripsi']);
            $kegiatan->setFoto((string)$row['foto']);
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