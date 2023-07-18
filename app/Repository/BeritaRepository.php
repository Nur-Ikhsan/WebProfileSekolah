<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Berita;

class BeritaRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveBerita(Berita $berita): Berita
    {
        $statement = $this->connection->prepare('INSERT INTO berita (id_berita, tanggal, judul_berita, isi_berita, foto) VALUES (?, ?, ?, ?, ?)');
        $statement->execute([
            $berita->getIdBerita(),
            $berita->getTanggal(),
            $berita->getJudulBerita(),
            $berita->getIsiBerita(),
            $berita->getFoto()
        ]);

        return $berita;
    }

    public function findBeritaById(string $id): ?Berita
    {
        $statement = $this->connection->prepare('SELECT * FROM berita WHERE id_berita = ?');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $berita = new Berita();
        $berita->setIdBerita((string)$row['id_berita']);
        $berita->setTanggal((string)$row['tanggal']);
        $berita->setJudulBerita((string)$row['judul_berita']);
        $berita->setIsiBerita((string)$row['isi_berita']);
        $berita->setFoto((string)$row['foto']);

        return $berita;
    }

    public function updateBerita(Berita $berita): Berita
    {
        $statement = $this->connection->prepare('UPDATE berita SET tanggal = ?, judul_berita = ?, isi_berita = ?, foto = ? WHERE id_berita = ?');
        $statement->execute([
            $berita->getTanggal(),
            $berita->getJudulBerita(),
            $berita->getIsiBerita(),
            $berita->getFoto(),
            $berita->getIdBerita()
        ]);

        return $berita;
    }

    public function deleteBerita(string $id): bool
    {
        $statement = $this->connection->prepare('DELETE FROM berita WHERE id_berita = ?');
        $statement->execute([$id]);

        return $statement->rowCount() > 0;
    }

    public function getAllBerita(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM berita ORDER BY tanggal');
        $statement->execute();

        $rows = $statement->fetchAll();
        $beritaList = [];
        foreach ($rows as $row) {
            $berita = new Berita();
            $berita->setIdBerita((string)$row['id_berita']);
            $berita->setTanggal((string)$row['tanggal']);
            $berita->setJudulBerita((string)$row['judul_berita']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }

    public function getBeritaPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM berita ORDER BY tanggal LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $rows = $statement->fetchAll();
        $beritaList = [];
        foreach ($rows as $row) {
            $berita = new Berita();
            $berita->setIdBerita((string)$row['id_berita']);
            $berita->setTanggal((string)$row['tanggal']);
            $berita->setJudulBerita((string)$row['judul_berita']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }
}