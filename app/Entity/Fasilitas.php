<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Fasilitas
{
    private string $id;
    private string $nama;
    private string $deskripsi;
    private string $foto;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNama(string $nama): void
    {
        $this->nama = $nama;
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
