<?php
require_once '../classes/Bdd.php';

class Authentication extends Bdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($userData)
    {
        $sql = "SELECT id, pseudo, email FROM user WHERE email = :email AND password = :password";

        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam('email', $userData['email']);
            $stmt->bindParam('password', $userData['password']);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }
    }

    public function logout()
    {

    }
}
