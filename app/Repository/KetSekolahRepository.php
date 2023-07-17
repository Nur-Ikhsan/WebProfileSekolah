<?php

namespace Rubygroup\WebProfileSekolah\Repository;

use PDO;
use Rubygroup\WebProfileSekolah\Entity\KetSekolah;

class KetSekolahRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    // buat getVisiMisi
    public function getVisiMisi(): ?KetSekolah
    {
        $statement = $this->connection->query("SELECT * FROM ket_sekolah LIMIT 1");

        try {
            if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $visiMisi = new KetSekolah();
                $visiMisi->setId($row['id']);
                $visiMisi->setVisi($row['visi']);
                $visiMisi->setMisi($row['misi']);
                return $visiMisi;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function updateVisiMisi(KetSekolah $visiMisi): KetSekolah
    {
        $statement = $this->connection->prepare("UPDATE ket_sekolah SET visi = ?, misi = ? WHERE id = ?");
        $statement->execute([
            $visiMisi->getVisi(),
            $visiMisi->getMisi(),
            $visiMisi->getId()
        ]);

        return $visiMisi;
    }

    public function getStrukturOrganisasi(): ?KetSekolah
    {
        $statement = $this->connection->query("SELECT * FROM ket_sekolah LIMIT 1");

        try {
            if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $strukturOrganisasi = new KetSekolah();
                $strukturOrganisasi->setId($row['id']);
                $strukturOrganisasi->setStrukturOrganisasi($row['struktur_organisasi']);
                return $strukturOrganisasi;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function updateStrukturOrganisasi(KetSekolah $strukturOrganisasi): KetSekolah
    {
        $statement = $this->connection->prepare("UPDATE ket_sekolah SET struktur_organisasi = ? WHERE id = ?");
        $statement->execute([
            $strukturOrganisasi->getStrukturOrganisasi(),
            $strukturOrganisasi->getId()
        ]);

        return $strukturOrganisasi;
    }

    public function getKurikulum(): ?KetSekolah
    {
        $statement = $this->connection->query("SELECT * FROM ket_sekolah LIMIT 1");

        try {
            if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $kurikulum = new KetSekolah();
                $kurikulum->setId($row['id']);
                $kurikulum->setNamaKurikulum($row['nama_kurikulum']);
                $kurikulum->setDekripsiKurikulum($row['deskripsi_kurikulum']);
                return $kurikulum;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function updateKurikulum(KetSekolah $kurikulum): KetSekolah
    {
        $statement = $this->connection->prepare("UPDATE ket_sekolah SET nama_kurikulum = ?, deskripsi_kurikulum = ? WHERE id = ?");
        $statement->execute([
            $kurikulum->getNamaKurikulum(),
            $kurikulum->getDekripsiKurikulum(),
            $kurikulum->getId()
        ]);

        return $kurikulum;
    }

}