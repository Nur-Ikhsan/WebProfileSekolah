<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Rubygroup\WebProfileSekolah\Entity\Sekolah;
use Rubygroup\WebProfileSekolah\Repository\SekolahRepository;

class SekolahService
{
    private SekolahRepository $sekolahRepository;

    public function __construct(SekolahRepository $sekolahRepository)
    {
        $this->sekolahRepository = $sekolahRepository;
    }

    public function getSekolah(): ?Sekolah
    {
        return $this->sekolahRepository->getSekolah();
    }

    public function editSekolah(Sekolah $sekolah): Sekolah
    {
        return $this->sekolahRepository->editSekolah($sekolah);
    }
}
