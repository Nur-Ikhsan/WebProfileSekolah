<?php

namespace Rubygroup\WebProfileSekolah\Service;

use Rubygroup\WebProfileSekolah\Entity\Admin;
use Rubygroup\WebProfileSekolah\Entity\Session;
use Rubygroup\WebProfileSekolah\Repository\AdminRepository;
use Rubygroup\WebProfileSekolah\Repository\SessionRepository;

class SessionService
{
    public static string $COOKIE_NAME = 'X-RB-SESSION';

    private SessionRepository $sessionRepository;
    private AdminRepository $adminRepository;

    public function __construct(SessionRepository $sessionRepository, AdminRepository $adminRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->adminRepository = $adminRepository;
    }

    public function createSession(int $adminId): Session
    {
        $session = new Session();
        $session->setId(uniqid());
        $session->setAdminId($adminId);
        $this->sessionRepository->save($session);

        setcookie(self::$COOKIE_NAME, $session->getId(), time() + (86400 * 30), "/"); // 86400 = 1 day

        return $session;
    }

    public function deleteSession(): void
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);
        setcookie(self::$COOKIE_NAME, '', time() - 3600, '/');
    }

    public function findSession(): ?Admin
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $session = $this->sessionRepository->findById($sessionId);
        if ($session != null) {
            return $this->adminRepository->findById($session->getAdminId());
        }
        return null;
    }
}