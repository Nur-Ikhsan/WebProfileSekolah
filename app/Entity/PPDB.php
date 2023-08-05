<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class PPDB
{
    private string $idPPDB;
    private string $judul;
    private string $deskripsi;
    private string $brosur;
    private string $foto;

    public function getIdPPDB(): string
    {
        return $this->idPPDB;
    }

    public function setIdPPDB(string $idPPDB): void
    {
        $this->idPPDB = $idPPDB;
    }

    public function getJudul(): string
    {
        return $this->judul;
    }

    public function setJudul(string $judul): void
    {
        $this->judul = $judul;
    }

    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void
    {
        $this->deskripsi = $deskripsi;
    }

    public function getBrosur(): string
    {
        return $this->brosur;
    }

    public function setBrosur(string $brosur): void
    {
        $this->brosur = $brosur;
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