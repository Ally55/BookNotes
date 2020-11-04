<?php


namespace BookNotes\Controllers;


class SignupController extends AbstractController
{
    public function index() {
        return $this->view('signup');
    }

    public function create() {
        $errors = validateInput();

        $email = $_POST['email'];
        $username = $_POST['username'];
        if(empty($username)) {
            $errors[] = 'Please enter a username.';
        }
        if(strlen($username) < 3) {
            $errors[] = 'Your username is too short.';
        }
        if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9]*$/',$username)) {
            $errors[] = 'Your username must begin with a letter.';
        }

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $hashPassword = '';
        if($password === $confirmPassword) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $errors[] = 'The passwords do not match.';
        }

        if ($query->findUserByEmail($email)) {
            $errors[] = 'This email is already registered.';
        } elseif (count($errors) === 0) {
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashPassword
            ];
            $query->insertUser($data);
            if (isset($_POST['username'])) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['message'] = 'You have been successfully registered on our site! Enjoy!';
            }
            header('Location:/login');
            exit;
        }
    }
}