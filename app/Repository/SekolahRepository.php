<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Sekolah;

class SekolahRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getSekolah(): ?Sekolah
    {
        $statement = $this->connection->query('SELECT * FROM sekolah LIMIT 1');
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $sekolah = new Sekolah();
        $sekolah->setId($row['id_sekolah']);
        $sekolah->setNama($row['nama_sekolah']);
        $sekolah->setAlamat($row['alamat']);
        $sekolah->setTelepon($row['telepon']);
        $sekolah->setEmail($row['email']);
        $sekolah->setWebsite($row['website']);
        $sekolah->setJudulPengantar($row['judul_pengantar']);
        $sekolah->setDeskripsi($row['deskripsi']);

        return $sekolah;
    }

    public function editSekolah(Sekolah $sekolah): Sekolah
    {
        $statement = $this->connection->prepare('UPDATE sekolah SET nama_sekolah = ?, alamat = ?, telepon = ?, email = ?, website = ?, judul_pengantar = ?, deskripsi = ? WHERE id_sekolah = ?');
        $statement->execute([
            $sekolah->getNama(),
            $sekolah->getAlamat(),
            $sekolah->getTelepon(),
            $sekolah->getEmail(),
            $sekolah->getWebsite(),
            $sekolah->getJudulPengantar(),
            $sekolah->getDeskripsi(),
            $sekolah->getId()
        ]);

        return $sekolah;
    }
}
