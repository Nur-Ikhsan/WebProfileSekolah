<?php

function getDatabaseConfig(): array{
    return [
        "database" => [
            "production" => [
                "url" => "mysql:host=localhost:3306;dbname=sch_mtsn2sambas",
                "username" => "root",
                "password" => ""
            ],
            "testing" => [
                "url" => "mysql:host=localhost:3306;dbname=sch_mtsn2sambas_test",
                "username" => "root",
                "password" => ""
            ],
        ]
    ];
}
