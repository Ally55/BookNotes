<div class="container-fluid background-div">

    <?php include(__DIR__ . "/header.php");

    if (isAuthenticated()) { ?>
            <div class="row mt-5 no-gutters">
                <div class="col text-center">
                    <h1> <?php
                        $email = $_SESSION['user']['email'];
                        $user = findUserByEmail($dbConnection, $email);
                        if (isset($user['username'])) {
                            echo ucwords(htmlspecialchars($user['username'], ENT_QUOTES));
                        }?>'s notes</h1>
                </div>
            </div>
    <div class="row no-gutters text-center mt-5 book-container mx-auto">
    <?php $dataFromDB = getUserDataNotesFromDB($dbConnection, $_SESSION['user']['id']);
    if (empty($dataFromDB)) { ?>
            <div class="col">
                <h2 class="no-notes">
                    You have not entered any notes yet.
                    <br>
                    Now you have the possibility to create <a href="create_notes">new notes</a>!
                </h2>
            </div>
     <?php } ?>
        <?php foreach(getUserDataNotesFromDB($dbConnection, $_SESSION['user']['id']) as $note) { ?>
            <div class="col card mb-5 card-notes">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="<?php echo htmlspecialchars($note['cover_link'], ENT_QUOTES); ?> " class="card-img d-inline-block">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body bg-light" >
                            <h2 class="card-title mb-1"> <?php echo htmlspecialchars($note['title'], ENT_QUOTES); ?> </h2>
                            <div class="d-flex align-items-center justify-content-around text-center mb-4">
                                <span class="text-muted note-author"><?php echo htmlspecialchars($note['author'], ENT_QUOTES); ?></span>
                                <span class="text-muted note-rate">Rate: <?php echo htmlspecialchars($note['rate'], ENT_QUOTES); ?>/10</span>
                            </div>
                            <div>
                                <p class="card-text text-left note-intro"> <?php echo htmlspecialchars($note['intro'], ENT_QUOTES); ?> </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php } else {
        header('Location: /login');
        exit;
    } ?>
</div>