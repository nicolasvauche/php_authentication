<?php
class Bdd
{
    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct($envPath)
    {
        require_once $envPath;

        $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';charset=UTF8';

        try {
            $this->connection = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        //echo "Connexion BDD OK";
    }
}
