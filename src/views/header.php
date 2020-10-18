<header class="row no-gutters logo-section d-flex">
    <div class="col">
        <a href="/" class="logo">BookNotes</a>
    </div>

    <div class="col d-flex align-items-center justify-content-end">
        <?php if (isAuthenticated()) { ?>
            <a href="
            <?php
            if ($pathInfo === '/create_notes') {
                echo '/library';
            } else {
                echo '/create_notes';
            }?>" type="button" class="btn btn-light ml-4 mr-4">
                <?php if ($pathInfo === '/create_notes') {
                    echo 'ALL NOTES';
                } else {
                    echo 'NEW NOTE' ;
                } ?> </a>
            <a href="<?php if ($pathInfo === '/user_notes') {
                echo '/library';
            } else {
                echo '/user_notes';
            } ?>" type="button" class="btn btn-light"><?php if ($pathInfo === '/user_notes') {
                echo 'ALL NOTES';
            } else {
                echo 'MY NOTES';
            } ?> </a>
        <?php } ?>

        <p class="m-0">
            <?php
            if ($pathInfo === '/login' || $pathInfo === '/library' && !isAuthenticated()) {
                echo 'Not a member?';
            } elseif ($pathInfo === '/library' || $pathInfo === '/create_notes' || $pathInfo === '/user_notes') {
                echo '';
            } else {
                echo 'Already a member?';
            }
            ?>
        </p>
        <br>
        <a href="<?php if($pathInfo === '/login' || $pathInfo === '/library' && !isAuthenticated()) {
            echo '/signup';
        } elseif (isAuthenticated()) {  // ($pathInfo === '/library' || $pathInfo === '/create_notes' || $pathInfo === '/user_notes')
            echo '/logout';
        } else {
            echo '/login';
        }
        ?>" type="button" class="btn btn-primary ml-4 mr-4">
            <?php if($pathInfo === '/login' || $pathInfo === '/library' && !isAuthenticated()) {
                echo 'SIGN UP';
                } elseif (isAuthenticated()) {   // ($pathInfo === '/library' || $pathInfo === '/create_notes' || $pathInfo === '/user_notes')
                echo 'LOG OUT';
                } else {
                echo 'LOG IN';
                }
            ?>
        </a>
    </div>
</header>
