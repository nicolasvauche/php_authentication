<?php
require_once '../classes/Bdd.php';
session_start();

class Authentication extends Bdd
{
    public function __construct()
    {
        parent::__construct('../../../config/env.php');
    }

    public function login($userData)
    {
        $sql = "SELECT id, pseudo, email, role FROM user WHERE email = :email AND password = :password";
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
            $_SESSION['user'] = [
                'id' => $res['id'],
                'pseudo' => $res['pseudo'],
                'email' => $res['email'],
                'role' => $res['role'],
            ];
            Header('Location: ../../../');
        } else {
            Header('Location: ../../../connexion.php?error=true');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        Header('Location: ../../../');
    }
}
