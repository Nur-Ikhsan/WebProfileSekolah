<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Berita
{
    private string $idBerita;
    private string $tanggal;
    private string $judulBerita;
    private string $isiBerita;
    private string $foto;

    /**
     * @return string
     */
    public function getIdBerita(): string
    {
        return $this->idBerita;
    }

    /**
     * @param string $idBerita
     */
    public function setIdBerita(string $idBerita): void
    {
        $this->idBerita = $idBerita;
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
    public function getJudulBerita(): string
    {
        return $this->judulBerita;
    }

    /**
     * @param string $judulBerita
     */
    public function setJudulBerita(string $judulBerita): void
    {
        $this->judulBerita = $judulBerita;
    }

    /**
     * @return string
     */
    public function getIsiBerita(): string
    {
        return $this->isiBerita;
    }

    /**
     * @param string $isiBerita
     */
    public function setIsiBerita(string $isiBerita): void
    {
        $this->isiBerita = $isiBerita;
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



}