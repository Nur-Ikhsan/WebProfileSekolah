<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Sekolah
{
    private string $id;
    private string $nama;
    private string $alamat;
    private string $telepon;
    private string $email;
    private string $website;
    private string $judulPengantar;
    private string $deskripsi;

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

    public function getAlamat(): string
    {
        return $this->alamat;
    }

    public function setAlamat(string $alamat): void
    {
        $this->alamat = $alamat;
    }

    public function getTelepon(): string
    {
        return $this->telepon;
    }

    public function setTelepon(string $telepon): void
    {
        $this->telepon = $telepon;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getJudulPengantar(): string
    {
        return $this->judulPengantar;
    }

    public function setJudulPengantar(string $judulPengantar): void
    {
        $this->judulPengantar = $judulPengantar;
    }

    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void
    {
        $this->deskripsi = $deskripsi;
    }
}
