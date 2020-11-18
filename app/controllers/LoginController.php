<?php


namespace BookNotes\Controllers;

use BookNotes\Controllers\AbstractController;
use BookNotes\Core\Container;
use BookNotes\Core\Validator\Validator;
use BookNotes\Authentication;


class LoginController extends AbstractController
{
    public function index()
    {
        if (Authentication::isAuthenticated()) {
            $this->redirect('library');
        }

        return $this->view('login');
    }

    public function login()
    {
        $query = Container::get('query');

        $validator = new Validator($_POST);
        $errors = $validator->validateLogin();
        if(count($errors) === 0) {

            $user = $query->findUserByEmail($_POST['email']);

            if (!$user) {
                $errors[] = 'The account does not exist';
            } elseif (password_verify($_POST['password'], $user['password'])) {
                Authentication::authenticateUser($user);
            } else {
                $errors[] = 'Your password is incorrect';
            }
        } else {
            $errors[] = 'Login failed';
        }

        if ($errors) {
            return $this->view('login', compact('errors'));
        }

        if (Authentication::isAuthenticated()) {
            $this->redirect('library');
        }

        $this->redirect('library');
    }


    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirect('');
    }
}