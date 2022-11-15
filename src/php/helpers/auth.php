<?php
session_start();

function getAuthenticatedUserId()
{
    return isset($_SESSION['user']) ?? false;
}

function getAuthenticatedUserPseudo()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['pseudo'];
    } else {
        return false;
    }
}

function getAuthenticatedUserEmail()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['email'];
    } else {
        return false;
    }
}

function getAuthenticatedUserRole()
{
    if (isset($_SESSION['user'])) {
        return match ($_SESSION['user']['role']) {
            'ROLE_ADMIN' => 'administrateur',
            'ROLE_USER' => 'utilisateur',
            default => 'inconnu',
        };
    } else {
        return false;
    }
}

function isAdmin()
{
    return $_SESSION['user']['role'] === 'ROLE_ADMIN';
}
