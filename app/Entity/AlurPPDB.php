<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class AlurPPDB
{
    private string $idAlurPpdb;
    private int $urutan;
    private string $judul;
    private string $tanggal;
    private string $idPpdb;

    public function getIdAlurPpdb(): string
    {
        return $this->idAlurPpdb;
    }

    /**
     * @return int
     */
    public function getUrutan(): int
    {
        return $this->urutan;
    }

    /**
     * @param int $urutan
     */
    public function setUrutan(int $urutan): void
    {
        $this->urutan = $urutan;
    }

    public function setIdAlurPpdb(string $idAlurPpdb): void
    {
        $this->idAlurPpdb = $idAlurPpdb;
    }

    public function getJudul(): string
    {
        return $this->judul;
    }

    public function setJudul(string $judul): void
    {
        $this->judul = $judul;
    }

    public function getTanggal(): string
    {
        return $this->tanggal;
    }

    public function setTanggal(string $tanggal): void
    {
        $this->tanggal = $tanggal;
    }

    public function getIdPpdb(): string
    {
        return $this->idPpdb;
    }

    public function setIdPpdb(string $idPpdb): void
    {
        $this->idPpdb = $idPpdb;
    }
}