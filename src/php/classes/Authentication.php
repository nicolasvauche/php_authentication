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

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        if ($res) {
            setcookie('userid', $res['id'], time() + (86400 * 30), '/');
            Header('Location: ../../../');
        } else {
            Header('Location: ../../../connexion.php?error=true');
        }
    }

    public function logout()
    {
        unset($_COOKIE['userid']);
        setcookie('userid', null, -1, '/');
        Header('Location: ../../../');
    }
}
