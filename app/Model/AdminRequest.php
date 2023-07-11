<?php

namespace Rubygroup\WebProfileSekolah\Model;

use Rubygroup\WebProfileSekolah\Entity\GuruStaff;

class AdminRequest
{
    public ?string $id = null;
    public ?string $username = null;
    public ?string $password = null;
    public ?string $newPassword = null;
    public ?string $confirmNewPassword = null;
    public ?GuruStaff $guruStaff = null;
}