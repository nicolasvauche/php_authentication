<?php
session_start();

function getAuthenticatedUserId()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return false;
    }
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
        return $_SESSION['user']['role'];
    } else {
        return false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] === 'ROLE_ADMIN') {
            return true;
        }
    }

    return false;
}
