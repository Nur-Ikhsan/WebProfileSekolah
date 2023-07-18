<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Config\Database;
use Rubygroup\WebProfileSekolah\Entity\Galeri;

class GaleriRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveGaleri(Galeri $galeri): Galeri
    {
        $query = "INSERT INTO galeri (id_galeri, judul_galeri, deskripsi, foto) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->execute([
            $galeri->getIdGaleri(),
            $galeri->getJudulGaleri(),
            $galeri->getDeskripsi(),
            $galeri->getFoto()
        ]);
        return $galeri;
    }

    public function findGaleriById(string $id): ?Galeri
    {
        $query = "SELECT * FROM galeri WHERE id_galeri = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->createGaleriFromRow($row);
    }

    public function updateGaleri(Galeri $galeri): Galeri
    {
        $query = "UPDATE galeri SET judul_galeri = ?, deskripsi = ?, foto = ? WHERE id_galeri = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([
            $galeri->getJudulGaleri(),
            $galeri->getDeskripsi(),
            $galeri->getFoto(),
            $galeri->getIdGaleri()
        ]);
        return $galeri;
    }

    public function deleteGaleri(Galeri $galeri): bool
    {
        $query = "DELETE FROM galeri WHERE id_galeri = ?";
        $statement = $this->connection->prepare($query);
        return $statement->execute([$galeri->getIdGaleri()]);
    }

    public function getAllGaleri(): array
    {
        $query = "SELECT * FROM galeri";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $galeriList = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $galeri = new Galeri();
            $galeri->setIdGaleri($row['id_galeri']);
            $galeri->setJudulGaleri($row['judul_galeri']);
            $galeri->setDeskripsi($row['deskripsi']);
            $galeri->setFoto($row['foto']);
            $galeriList[] = $galeri;
        }

        return $galeriList;
    }

    public function getAllGaleriPagination(int $limit, int $offset): array
    {
        $statement = $this->connection->prepare('SELECT * FROM galeri LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $galeriList = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $galeri = new Galeri();
            $galeri->setIdGaleri($row['id_galeri']);
            $galeri->setJudulGaleri($row['judul_galeri']);
            $galeri->setDeskripsi($row['deskripsi']);
            $galeri->setFoto($row['foto']);
            $galeriList[] = $galeri;
        }

        return $galeriList;
    }

    private function createGaleriFromRow(array $row): Galeri
    {
        $galeri = new Galeri();
        $galeri->setIdGaleri($row['id_galeri']);
        $galeri->setJudulGaleri($row['judul_galeri']);
        $galeri->setDeskripsi($row['deskripsi']);
        $galeri->setFoto($row['foto']);
        return $galeri;
    }
}
