<?php

namespace Rubygroup\WebProfileSekolah\App;

class View
{

    public static function render(string $view, array $model = []): void
    {
        extract($model);

        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
}