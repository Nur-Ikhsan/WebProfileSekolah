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
        $statement = $this->connection->prepare('INSERT INTO berita (id_berita, tanggal, judul_berita, slug, isi_berita, foto) VALUES (?, ?, ?, ?, ?, ?)');
        $statement->execute([
            $berita->getIdBerita(),
            $berita->getTanggal(),
            $berita->getJudulBerita(),
            $berita->getSlug(),
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
        $berita->setSlug((string)$row['slug']);
        $berita->setIsiBerita((string)$row['isi_berita']);
        $berita->setFoto((string)$row['foto']);

        return $berita;
    }

    public function updateBerita(Berita $berita): Berita
    {
        $statement = $this->connection->prepare('UPDATE berita SET tanggal = ?, judul_berita = ?, slug = ?, isi_berita = ?, foto = ? WHERE id_berita = ?');
        $statement->execute([
            $berita->getTanggal(),
            $berita->getJudulBerita(),
            $berita->getSlug(),
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
            $berita->setSlug((string)$row['slug']);
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
            $berita->setSlug((string)$row['slug']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }

    public function findBeritaBySlug(string $slug) : ?Berita
    {
        $statement = $this->connection->prepare('SELECT * FROM berita WHERE slug = ?');
        $statement->execute([$slug]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $berita = new Berita();
        $berita->setIdBerita((string)$row['id_berita']);
        $berita->setTanggal((string)$row['tanggal']);
        $berita->setJudulBerita((string)$row['judul_berita']);
        $berita->setSlug((string)$row['slug']);
        $berita->setIsiBerita((string)$row['isi_berita']);
        $berita->setFoto((string)$row['foto']);

        return $berita;
    }

    public function searchBerita(string $searchQuery): array
    {
        $searchQuery = "%$searchQuery%"; // Tambahkan wildcard (%) pada awal dan akhir query

        $statement = $this->connection->prepare('SELECT * FROM berita WHERE judul_berita LIKE :searchQuery ORDER BY tanggal');
        $statement->bindValue(':searchQuery', $searchQuery, PDO::PARAM_STR);
        $statement->execute();

        $rows = $statement->fetchAll();
        $beritaList = [];
        foreach ($rows as $row) {
            $berita = new Berita();
            $berita->setIdBerita((string)$row['id_berita']);
            $berita->setTanggal((string)$row['tanggal']);
            $berita->setJudulBerita((string)$row['judul_berita']);
            $berita->setSlug((string)$row['slug']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }

    public function searchBeritaPagination($perPage, float|int $offset, string $search): array
    {
        $search = "%$search%"; // Tambahkan wildcard (%) pada awal dan akhir query

        $statement = $this->connection->prepare('SELECT * FROM berita WHERE judul_berita LIKE :search ORDER BY tanggal LIMIT :perPage OFFSET :offset');
        $statement->bindValue(':search', $search);
        $statement->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $rows = $statement->fetchAll();
        $beritaList = [];
        foreach ($rows as $row) {
            $berita = new Berita();
            $berita->setIdBerita((string)$row['id_berita']);
            $berita->setTanggal((string)$row['tanggal']);
            $berita->setJudulBerita((string)$row['judul_berita']);
            $berita->setSlug((string)$row['slug']);
            $berita->setIsiBerita((string)$row['isi_berita']);
            $berita->setFoto((string)$row['foto']);

            $beritaList[] = $berita;
        }

        return $beritaList;
    }
}