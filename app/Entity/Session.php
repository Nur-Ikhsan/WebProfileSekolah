<?php

namespace Rubygroup\WebProfileSekolah\Entity;

class Session
{
    private string $id;
    private string $adminId;

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAdminId(): string
    {
        return $this->adminId;
    }

    /**
     * @param int $adminId
     */
    public function setAdminId(string $adminId): void
    {
        $this->adminId = $adminId;
    }


}