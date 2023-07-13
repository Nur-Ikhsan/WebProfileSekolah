<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\Prestasi;

class PrestasiRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function savePrestasi(Prestasi $prestasi): Prestasi
    {
        $query = "INSERT INTO prestasi (id_prestasi, tanggal, kategori, nama_prestasi) 
                  VALUES (:id, :tanggal, :kategori, :nama)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $prestasi->getId());
        $stmt->bindValue(':tanggal', $prestasi->getTanggal());
        $stmt->bindValue(':kategori', $prestasi->getKategori());
        $stmt->bindValue(':nama', $prestasi->getNama());
        $stmt->execute();

        return $prestasi;
    }

    public function findPrestasiById(string $id): ?Prestasi
    {
        $query = "SELECT * FROM prestasi WHERE id_prestasi = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return $this->mapToPrestasi($row);
    }

    public function updatePrestasi(Prestasi $prestasi): Prestasi
    {
        $query = "UPDATE prestasi 
                  SET tanggal = :tanggal, kategori = :kategori, nama_prestasi = :nama 
                  WHERE id_prestasi = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $prestasi->getId());
        $stmt->bindValue(':tanggal', $prestasi->getTanggal());
        $stmt->bindValue(':kategori', $prestasi->getKategori());
        $stmt->bindValue(':nama', $prestasi->getNama());
        $stmt->execute();

        return $prestasi;
    }

    public function deletePrestasi(Prestasi $prestasi): bool
    {
        $query = "DELETE FROM prestasi WHERE id_prestasi = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $prestasi->getId());
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    private function mapToPrestasi(array $row): Prestasi
    {
        $prestasi = new Prestasi();
        $prestasi->setId($row['id_prestasi']);
        $prestasi->setTanggal($row['tanggal']);
        $prestasi->setKategori($row['kategori']);
        $prestasi->setNama($row['nama_prestasi']);

        return $prestasi;
    }

    public function getAllPrestasi(): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM prestasi ORDER BY tanggal DESC ');
        $stmt->execute();

        $prestasiList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $prestasi = new Prestasi();
            $prestasi->setId($row['id_prestasi']);
            $prestasi->setTanggal($row['tanggal']);
            $prestasi->setKategori($row['kategori']);
            $prestasi->setNama($row['nama_prestasi']);

            $prestasiList[] = $prestasi;
        }

        return $prestasiList;
    }

    public function getAllPrestasiPagination(int $limit, int $offset): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM prestasi ORDER BY tanggal DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $prestasiList = [];
        while ($row = $stmt->fetch()) {
            $prestasi = new Prestasi();
            $prestasi->setId($row['id_prestasi']);
            $prestasi->setTanggal($row['tanggal']);
            $prestasi->setKategori($row['kategori']);
            $prestasi->setNama($row['nama_prestasi']);

            $prestasiList[] = $prestasi;
        }

        return $prestasiList;
    }

}
