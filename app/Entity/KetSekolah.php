<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class KetSekolah
{
    private string $id;
    private string $strukturOrganisasi;
    private string $namaKurikulum;
    private string $dekripsiKurikulum;
    private string $visi;
    private string $misi;

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
    public function getStrukturOrganisasi(): string
    {
        return $this->strukturOrganisasi;
    }

    /**
     * @param string $strukturOrganisasi
     */
    public function setStrukturOrganisasi(string $strukturOrganisasi): void
    {
        $this->strukturOrganisasi = $strukturOrganisasi;
    }

    /**
     * @return string
     */
    public function getNamaKurikulum(): string
    {
        return $this->namaKurikulum;
    }

    /**
     * @param string $namaKurikulum
     */
    public function setNamaKurikulum(string $namaKurikulum): void
    {
        $this->namaKurikulum = $namaKurikulum;
    }

    /**
     * @return string
     */
    public function getDekripsiKurikulum(): string
    {
        return $this->dekripsiKurikulum;
    }

    /**
     * @param string $dekripsiKurikulum
     */
    public function setDekripsiKurikulum(string $dekripsiKurikulum): void
    {
        $this->dekripsiKurikulum = $dekripsiKurikulum;
    }

    /**
     * @return string
     */
    public function getVisi(): string
    {
        return $this->visi;
    }

    /**
     * @param string $visi
     */
    public function setVisi(string $visi): void
    {
        $this->visi = $visi;
    }

    /**
     * @return string
     */
    public function getMisi(): string
    {
        return $this->misi;
    }

    /**
     * @param string $misi
     */
    public function setMisi(string $misi): void
    {
        $this->misi = $misi;
    }

}