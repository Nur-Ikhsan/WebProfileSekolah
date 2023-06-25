<?php

namespace Rubygroup\WebProfileSekolah\App;

class View
{

    public static function render(string $view, array $model = []): void
    {
        extract($model);

        require __DIR__ . '/../View/layout/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/layout/footer.php';
    }

    public static function renderAdmin(string $view, array $model = []): void
    {
        extract($model);

        require __DIR__ . '/../View/layout/header-admin.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/layout/footer-admin.php';
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
}