<?php

namespace Rubygroup\WebProfileSekolah\Entity;

use DateTime;

class Prestasi
{
    private string $id;
    private string $tanggal;
    private string $kategori;
    private string $nama;

    public function getTanggal(): string
    {
        return $this->tanggal;
    }

    public function setTanggal(string $tanggal): void
    {
        $this->tanggal = $tanggal;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }


    public function getKategori(): string
    {
        return $this->kategori;
    }

    public function setKategori(string $kategori): void
    {
        $this->kategori = $kategori;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNama(string $nama): void
    {
        $this->nama = $nama;
    }
}
