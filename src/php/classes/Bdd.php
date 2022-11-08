<?php
require_once './config/env.php';

class Bdd
{
    private $connection;

    public function __construct()
    {
        echo '<pre>';
        echo getenv('DB_HOST') . "\n";
        echo getenv('DB_NAME') . "\n";
        echo getenv('DB_USER') . "\n";
        echo getenv('DB_PASSWORD') . "\n";
        echo '</pre>';
    }
}
