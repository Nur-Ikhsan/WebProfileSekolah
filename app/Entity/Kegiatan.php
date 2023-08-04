<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Kegiatan
{
    private string $idKegiatan;
    private string $tanggal;
    private string $namaKegiatan;
    private string $slug;
    private string $deskripsi;
    private string $foto;

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTanggal(): string
    {
        return $this->tanggal;
    }

    /**
     * @param string $tanggal
     */
    public function setTanggal(string $tanggal): void
    {
        $this->tanggal = $tanggal;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

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