<?php

function validateInput() {
    $errors = [];
    $email = $_POST['email'];
    if (empty($email)) {
        $errors[] = 'Email field is empty.';
    }
    if (strlen($email) > 255) {
        $errors[] = 'Your email is too long.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Your email is not valid.';
    }

    $password = $_POST['password'];
    if(empty($password)) {
        $errors[] = 'Please enter a password.';
    }
    if(strlen($password) < 6) {
        $errors[] = 'Your password is too short.';
    }
    return $errors;
}