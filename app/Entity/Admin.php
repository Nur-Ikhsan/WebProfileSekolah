<?php

namespace Rubygroup\WebProfileSekolah\Entity;
class Admin
{
    private string $id;
    private string $username;
    private string $password;
    private GuruStaff $guruStaff;

    /**
     * @return GuruStaff
     */
    public function getGuruStaff(): GuruStaff
    {
        return $this->guruStaff;
    }

    /**
     * @param GuruStaff $guruStaff
     */
    public function setGuruStaff(GuruStaff $guruStaff): void
    {
        $this->guruStaff = $guruStaff;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}