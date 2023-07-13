<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Ekstrakurikuler
{
    private string $idEkstrakurikuler;
    private string $namaEkstrakurikuler;
    private string $deskripsi;
    private string $icon;

    /**
     * @return string
     */
    public function getIdEkstrakurikuler(): string
    {
        return $this->idEkstrakurikuler;
    }

    /**
     * @param string $id_ekstrakurikuler
     */
    public function setIdEkstrakurikuler(string $id_ekstrakurikuler): void
    {
        $this->idEkstrakurikuler = $id_ekstrakurikuler;
    }

    /**
     * @return string
     */
    public function getNamaEkstrakurikuler(): string
    {
        return $this->namaEkstrakurikuler;
    }

    /**
     * @param string $namaEkstrakurikuler
     */
    public function setNamaEkstrakurikuler(string $namaEkstrakurikuler): void
    {
        $this->namaEkstrakurikuler = $namaEkstrakurikuler;
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

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }
}