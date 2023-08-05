<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use Rubygroup\WebProfileSekolah\Entity\AlurPPDB;
use Rubygroup\WebProfileSekolah\Entity\PPDB;
use Rubygroup\WebProfileSekolah\Exception\ValidationException;

class PPDBRepository
{
    private \PDO $connection;
    private PPDB $ppdb;
    private AlurPPDB $alurPPDB;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getPPDB(): ?PPDB
    {
        $statement = $this->connection->query("SELECT * FROM ppdb LIMIT 1");

        try {
            if ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $this->ppdb = new PPDB();
                $this->ppdb->setIdPPDB($row['id_ppdb']);
                $this->ppdb->setJudul($row['judul']);
                $this->ppdb->setDeskripsi($row['deskripsi']);
                $this->ppdb->setFoto($row['foto']);
                $this->ppdb->setBrosur($row['brosur']);
                return $this->ppdb;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function updatePPDB(PPDB $ppdb): PPDB
    {
        $statement = $this->connection->prepare("UPDATE ppdb SET judul = ?, deskripsi = ?, foto = ?, brosur = ? WHERE id_ppdb = ?");
        $statement->execute([
            $ppdb->getJudul(),
            $ppdb->getDeskripsi(),
            $ppdb->getFoto(),
            $ppdb->getBrosur(),
            $ppdb->getIdPPDB()
        ]);

        return $ppdb;
    }

    public function saveAlurPPDB(AlurPPDB $alurPPDB): AlurPPDB
    {
        $statement = $this->connection->prepare('INSERT INTO alur_ppdb (id_alur_ppdb, urutan, judul, tanggal, id_ppdb) VALUES (?, ?, ?, ?, ?)');
        $statement->execute([
            $alurPPDB->getIdAlurPPDB(),
            $alurPPDB->getUrutan(),
            $alurPPDB->getJudul(),
            $alurPPDB->getTanggal(),
            $alurPPDB->getIdPpdb()
        ]);

        return $alurPPDB;
    }


    public function updateAlurPPDB(AlurPPDB $alurPPDB): AlurPPDB
    {
        $statement = $this->connection->prepare('UPDATE alur_ppdb SET urutan = ?, judul = ?, tanggal = ? WHERE id_alur_ppdb = ?');
        $statement->execute([
            $alurPPDB->getUrutan(),
            $alurPPDB->getJudul(),
            $alurPPDB->getTanggal(),
            $alurPPDB->getIdAlurPpdb()
        ]);

        return $alurPPDB;
    }

    public function deleteAlurPPDB(string $id): bool
    {
        $statement = $this->connection->prepare('DELETE FROM alur_ppdb WHERE id_alur_ppdb = ?');
        $statement->execute([$id]);

        return $statement->rowCount() > 0;
    }

    public function findAlurPPDBById(string $id): ?AlurPPDB
    {
        $statement = $this->connection->prepare('SELECT * FROM alur_ppdb WHERE id_alur_ppdb = ? ORDER BY urutan ASC');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $alurPPDB = new AlurPPDB();
        $alurPPDB->setIdAlurPpdb((string)$row['id_alur_ppdb']);
        $alurPPDB->setUrutan((string)$row['urutan']);
        $alurPPDB->setJudul((string)$row['judul']);
        $alurPPDB->setTanggal((string)$row['tanggal']);
        $alurPPDB->setIdPpdb((string)$row['id_ppdb']);

        return $alurPPDB;
    }

    public function getAllAlurPPDB(): array
    {
        $statement = $this->connection->query('SELECT * FROM alur_ppdb ORDER BY urutan ASC');
        $alurPPDBs = [];
        while ($row = $statement->fetch()) {
            $alurPPDB = new AlurPPDB();
            $alurPPDB->setIdAlurPpdb((string)$row['id_alur_ppdb']);
            $alurPPDB->setUrutan((string)$row['urutan']);
            $alurPPDB->setJudul((string)$row['judul']);
            $alurPPDB->setTanggal((string)$row['tanggal']);
            $alurPPDB->setIdPpdb((string)$row['id_ppdb']);
            $alurPPDBs[] = $alurPPDB;
        }

        return $alurPPDBs;
    }
}