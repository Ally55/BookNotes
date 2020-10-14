<header class="row no-gutters logo-section d-flex">
    <div class="col">
        <a href="/" class="logo">BookNotes</a>
    </div>

    <div class="col d-flex align-items-center justify-content-end">
        <?php if (isAuthenticated()) { ?>
            <a href="/create_notes" type="button" class="btn btn-light">NEW NOTE</a>
        <?php } ?>

        <p class="m-0">
            <?php
            if ($pathInfo === '/login') {
                echo 'Not a member?';
            } elseif ($pathInfo === '/library' || $pathInfo === '/create_notes') {
                echo '';
            }else {
                echo 'Already a member?';
            }?>
        </p>
        <br>
        <a href="<?php if($pathInfo === '/login') {
            echo '/signup';
        } elseif ($pathInfo === '/library' || $pathInfo === '/create_notes') {
            echo '/logout';
        } else {
            echo '/login';
        } ?>" type="button" class="btn btn-primary ml-4 mr-4">
            <?php if($pathInfo === '/login') {
                echo 'SIGN UP';
                } elseif ($pathInfo === '/library' || $pathInfo === '/create_notes') {
                echo 'LOG OUT';
                } else {
                echo 'LOG IN';
                }
            ?>
        </a>
    </div>
</header>
