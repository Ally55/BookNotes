<?php

namespace BookNotes;

class Authentication
{
    static public function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    static public function authenticateUser($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];
        header('Location: /library');
        exit;
    }
}