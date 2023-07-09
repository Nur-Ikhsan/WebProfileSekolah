<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class GuruStaff
{
    private string $idGuruStaff;
    private string $namaGuru;
    private string $jabatan;
    private string $foto;

    public function getIdGuruStaff(): string
    {
        return $this->idGuruStaff;
    }

    public function setIdGuruStaff(string $idGuruStaff): void
    {
        $this->idGuruStaff = $idGuruStaff;
    }

    public function getNamaGuru(): string
    {
        return $this->namaGuru;
    }

    public function setNamaGuru(string $namaGuru): void
    {
        $this->namaGuru = $namaGuru;
    }

    public function getJabatan(): string
    {
        return $this->jabatan;
    }

    public function setJabatan(string $jabatan): void
    {
        $this->jabatan = $jabatan;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }
}
