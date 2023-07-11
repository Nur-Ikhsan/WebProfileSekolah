<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\GuruStaff;

class GuruStaffRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(GuruStaff $guruStaff): GuruStaff
    {
        $statement = $this->connection->prepare('INSERT INTO guru_staff (id_guru_staff, nama_guru, jabatan, foto) VALUES (?, ?, ?, ?)');
        $statement->execute([
            $guruStaff->getIdGuruStaff(),
            $guruStaff->getNamaGuru(),
            $guruStaff->getJabatan(),
            $guruStaff->getFoto()
        ]);

        return $guruStaff;
    }

    public function findById(string $id): ?GuruStaff
    {
        $statement = $this->connection->prepare('SELECT * FROM guru_staff WHERE id_guru_staff = ?');
        $statement->execute([$id]);

        $row = $statement->fetch();
        if (!$row) {
            return null;
        }

        $guruStaff = new GuruStaff();
        $guruStaff->setIdGuruStaff((string)$row['id_guru_staff']);
        $guruStaff->setNamaGuru((string)$row['nama_guru']);
        $guruStaff->setJabatan((string)$row['jabatan']);
        $guruStaff->setFoto((string)$row['foto']);

        return $guruStaff;
    }

    public function update(GuruStaff $guruStaff): GuruStaff
    {
        $statement = $this->connection->prepare('UPDATE guru_staff SET nama_guru = ?, jabatan = ?, foto = ? WHERE id_guru_staff = ?');
        $statement->execute([
            $guruStaff->getNamaGuru(),
            $guruStaff->getJabatan(),
            $guruStaff->getFoto(),
            $guruStaff->getIdGuruStaff()
        ]);

        return $guruStaff;
    }

    public function delete(GuruStaff $guruStaff): bool
    {
        $statement = $this->connection->prepare('DELETE FROM guru_staff WHERE id_guru_staff = ?');
        $statement->execute([$guruStaff->getIdGuruStaff()]);
        return $statement->rowCount() > 0;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare('SELECT * FROM guru_staff');
        $statement->execute();

        $guruStaffList = [];
        while ($row = $statement->fetch()) {
            $guruStaff = new GuruStaff();
            $guruStaff->setIdGuruStaff((string)$row['id_guru_staff']);
            $guruStaff->setNamaGuru((string)$row['nama_guru']);
            $guruStaff->setJabatan((string)$row['jabatan']);
            $guruStaff->setFoto((string)$row['foto']);

            $guruStaffList[] = $guruStaff;
        }

        return $guruStaffList;
    }
}
