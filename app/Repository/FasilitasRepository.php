<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Fasilitas;

class FasilitasRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Fasilitas $fasilitas): Fasilitas
    {
        $statement = $this->connection->prepare('INSERT INTO fasilitas (id_fasilitas, nama_fasilitas, deskripsi, foto) VALUES (?, ?, ?, ?)');
        $statement->execute([
            $fasilitas->getId(),
            $fasilitas->getNama(),
            $fasilitas->getDeskripsi(),
            $fasilitas->getFoto()
        ]);

        return $fasilitas;
    }

    public function findById(string $id): ?Fasilitas
    {
        $statement = $this->connection->prepare('SELECT * FROM fasilitas WHERE id_fasilitas = ?');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $fasilitas = new Fasilitas();
        $fasilitas->setId((string)$row['id_fasilitas']);
        $fasilitas->setNama((string)$row['nama_fasilitas']);
        $fasilitas->setDeskripsi((string)$row['deskripsi']);
        $fasilitas->setFoto((string)$row['foto']);

        return $fasilitas;
    }

    public function update(Fasilitas $fasilitas): Fasilitas
    {
        $statement = $this->connection->prepare('UPDATE fasilitas SET nama_fasilitas = ?, deskripsi = ?, foto = ? WHERE id_fasilitas = ?');
        $statement->execute([
            $fasilitas->getNama(),
            $fasilitas->getDeskripsi(),
            $fasilitas->getFoto(),
            $fasilitas->getId()
        ]);

        return $fasilitas;
    }

    public function delete(Fasilitas $fasilitas): bool
    {
        $statement = $this->connection->prepare('DELETE FROM fasilitas WHERE id_fasilitas = ?');
        $statement->execute([$fasilitas->getId()]);
        return $statement->rowCount() > 0;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM fasilitas');
        $statement->execute();

        $fasilitasList = [];
        while ($row = $statement->fetch()) {
            $fasilitas = new Fasilitas();
            $fasilitas->setId((string)$row['id_fasilitas']);
            $fasilitas->setNama((string)$row['nama_fasilitas']);
            $fasilitas->setDeskripsi((string)$row['deskripsi']);
            $fasilitas->setFoto((string)$row['foto']);

            $fasilitasList[] = $fasilitas;
        }

        return $fasilitasList;
    }
}
