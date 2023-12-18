<?php

namespace App\Controllers;

class HomeController implements ControllerInterface
{

    public static function canAccess(): bool
    {
        return $_SERVER['method'] === 'GET';
    }

    public static function view(): void
    {

        
        include_once  __DIR__ . '/../Views/home.php';
    }

}