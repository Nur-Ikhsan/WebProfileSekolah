<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Slideshow;

class SlideshowRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Slideshow $slideshow): Slideshow
    {
        $statement = $this->connection->prepare('INSERT INTO slideshow (id_slideshow, judul_slideshow, foto) VALUES (?, ?, ?)');
        $statement->execute([
            $slideshow->getId(),
            $slideshow->getJudul(),
            $slideshow->getFoto()
        ]);

        return $slideshow;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM slideshow');
        $statement->execute();

        $slideshows = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $slideshow = new Slideshow();
            $slideshow->setId($row['id_slideshow']);
            $slideshow->setJudul($row['judul_slideshow']);
            $slideshow->setFoto($row['foto']);

            $slideshows[] = $slideshow;
        }

        return $slideshows;
    }

    public function delete(Slideshow $slideshow): void
    {
        $statement = $this->connection->prepare('DELETE FROM slideshow WHERE id_slideshow = ?');
        $statement->execute([$slideshow->getId()]);
    }

    public function findById(string $id): ?Slideshow
    {
        $statement = $this->connection->prepare('SELECT * FROM slideshow WHERE id_slideshow = ?');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $slideshow = new Slideshow();
        $slideshow->setId((string)$row['id_slideshow']);
        $slideshow->setJudul((string)$row['judul_slideshow']);
        $slideshow->setFoto((string)$row['foto']);

        return $slideshow;
    }

    public function update(Slideshow $slideshow): Slideshow
    {
        $statement = $this->connection->prepare('UPDATE slideshow SET judul_slideshow = ?, foto = ? WHERE id_slideshow = ?');
        $statement->execute([
            $slideshow->getJudul(),
            $slideshow->getFoto(),
            $slideshow->getId()
        ]);

        return $slideshow;
    }
}
