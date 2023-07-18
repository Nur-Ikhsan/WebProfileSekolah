<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Galeri
{
    private string $idGaleri;
    private string $tanggal;
    private string $judulGaleri;
    private string $deskripsi;
    private string $foto;

    public function getIdGaleri(): string
    {
        return $this->idGaleri;
    }

    public function setIdGaleri(string $idGaleri): void
    {
        $this->idGaleri = $idGaleri;
    }

    public function getJudulGaleri(): string
    {
        return $this->judulGaleri;
    }

    public function setJudulGaleri(string $judulGaleri): void
    {
        $this->judulGaleri = $judulGaleri;
    }

    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void
    {
        $this->deskripsi = $deskripsi;
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
