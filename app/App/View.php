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

    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }

    // buat static render 404
    public static function render404(): void
    {
        http_response_code(404);
        View::render('404');
    }
}