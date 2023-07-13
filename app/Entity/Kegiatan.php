<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Kegiatan
{
    private string $idKegiatan;
    private string $namaKegiatan;
    private string $deskripsi;

    /**
     * @return string
     */
    public function getIdKegiatan(): string
    {
        return $this->idKegiatan;
    }

    /**
     * @param string $idKegiatan
     */
    public function setIdKegiatan(string $idKegiatan): void
    {
        $this->idKegiatan = $idKegiatan;
    }

    /**
     * @return string
     */
    public function getNamaKegiatan(): string
    {
        return $this->namaKegiatan;
    }

    /**
     * @param string $namaKegiatan
     */
    public function setNamaKegiatan(string $namaKegiatan): void
    {
        $this->namaKegiatan = $namaKegiatan;
    }

    /**
     * @return string
     */
    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    /**
     * @param string $deskripsi
     */
    public function setDeskripsi(string $deskripsi): void
    {
        $this->deskripsi = $deskripsi;
    }


}