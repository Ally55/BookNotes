<?php

if (isAuthenticated()) {
    header('Location:/library');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateInput();

    $password = $_POST['password'];
    $email = $_POST['email'];

    if (count($errors) === 0) {
        $user = findUserByEmail($dbConnection, $email);

        if(!$user) {
            $errors[] = 'The account does not exist';
        } elseif (password_verify($password, $user['password'])) {
            authenticateUser($user);
        } else {
            $errors[] = 'Your password is incorrect';
        }
    } else {
        $_SESSION['message'] = 'Login failed';
    }

}

?>

<div class="container-fluid background-div p-0">

    <?php include(__DIR__ . "/header.php"); ?>

    <div class="row no-gutters">
        <div class="col">
            <?php require_once __DIR__ . '/../flash_message.php'; ?>
        </div>
    </div>

    <div class="row no-gutters text-center mt-5">
        <div class="col">
            <h1 class="login-title">Log in your account</h1>
        </div>
    </div>


    <?php if(!empty($errors)) { ?>
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col alert alert-danger mt-4 error-message" role="alert">
                <ul class="error-list">
                    <?php foreach($errors as $error) { ?>
                        <li> <?php echo htmlspecialchars($error, ENT_QUOTES);?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>

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