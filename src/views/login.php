<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if (count($errors) === 0) {
        $user = findUserByEmail($dbConnection, $email);

        if(!$user) {
            $errors[] = 'The account does not exist';
        } elseif (password_verify($password, $user['password'])) {
            $_SESSION['authenticated_user'] = $_POST['email']; // remember the email of user who just logged in
            header('Location: /library');
            exit;
        } else {
            $errors[] = 'Your password is incorrect';
        }
    } else {
        $_SESSION['message'] = 'Login failed';
    }

}
?>

<div class="container-fluid background-div p-0">
    <header class="row no-gutters logo-section d-flex">
        <div class="col">
            <a href="../../public/index.php" class="logo">BookNotes</a>
        </div>

        <div class="col d-flex align-items-center justify-content-end">
            <p class="m-0">Not a member?</p>
            <br>
            <a href="signup" type="button" class="btn btn-primary ml-4 mr-4">SIGN UP</a>
        </div>
    </header>

    <div class="row no-gutters text-center mt-5">
        <div class="col">
            <h1 class="login-title">Log in your account</h1>
        </div>
    </div>

    <div class="row mt-5 no-gutters">
        <div class="col-4 mx-auto">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="label-form">Email address</label>
                    <input type="email" name="email" class="form-control input-form" id="exampleInputEmail1"
                           aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone
                        else.</small>
                </div>

                <div class="form-group">
                    <label for="password" class="label-form">Password</label>
                    <input type="password" name="password" class="form-control input-form" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary signup-button mt-4 ">LOG IN</button>
            </form>
        </div>
    </div>

</div>