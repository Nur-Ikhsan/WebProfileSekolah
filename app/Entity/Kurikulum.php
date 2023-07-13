<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Kurikulum
{
    private string $id;
    private string $komponen;
    private string $subKomponen;
    private string $kategori;
    private int $alokasiWaktu;
    private string $kelas;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKomponen(): string
    {
        return $this->komponen;
    }

    /**
     * @param string $komponen
     */
    public function setKomponen(string $komponen): void
    {
        $this->komponen = $komponen;
    }

    /**
     * @return string
     */
    public function getSubKomponen(): string
    {
        return $this->subKomponen;
    }

    /**
     * @param string $subKomponen
     */
    public function setSubKomponen(string $subKomponen): void
    {
        $this->subKomponen = $subKomponen;
    }

    /**
     * @return string
     */
    public function getKategori(): string
    {
        return $this->kategori;
    }

    /**
     * @param string $kategori
     */
    public function setKategori(string $kategori): void
    {
        $this->kategori = $kategori;
    }

    /**
     * @return int
     */
    public function getAlokasiWaktu(): int
    {
        return $this->alokasiWaktu;
    }

    /**
     * @param int $alokasiWaktu
     */
    public function setAlokasiWaktu(int $alokasiWaktu): void
    {
        $this->alokasiWaktu = $alokasiWaktu;
    }

    /**
     * @return string
     */
    public function getKelas(): string
    {
        return $this->kelas;
    }

    /**
     * @param string $kelas
     */
    public function setKelas(string $kelas): void
    {
        $this->kelas = $kelas;
    }

}