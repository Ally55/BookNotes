<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $title = $_POST['title'];

    if (empty($title)) {
        $errors[] = 'The title field should not be empty.';
    }
    if (strlen($title) > 100) {
        $errors = 'This title is too long. Please insert an available book title.';
    }
    if (!preg_match('/[a-zA-Z]/',$title)) {
        $errors[] = 'The book title must contain letters.';
    }

    $author = $_POST['author'];
    if (empty($author)) {
        $errors[] = 'The author field should not be empty.';
    }
    if (strlen($author) > 100) {
        $errors[] = 'The name of the author is too long.';
    }
    if (!preg_match('/[a-zA-Z]/', $author)) {
        $errors[] = 'The author field must only contain letters.';
    }

    $rate = $_POST['rate'];
    if (empty($rate)) {
        $errors[] = 'The rate field should not be empty.';
    }
    $rate = (int) $rate;
    if ($rate === 0) {
        $errors[] = 'The rate field should be grater than 0.';
    }
    if ($rate > 10) {
        $errors[] = 'The book rate should be minimum 1 and maximum 10.';
    }

    $coverLink = $_POST['cover_link'];
    if (empty($coverLink)) {
        $errors[] = 'The cover link field should not be empty.';
    }
    if (strlen($coverLink) > 255) {
        $errors[] = 'The cover link is too long.';
    }

    $intro = $_POST['intro'];
    if (empty($intro)) {
        $errors[] = "The note's intro should not be empty.";
    }

    $body = $_POST['body'];
    if (empty($body)) {
        $errors[] = "The note's body should not be empty.";
    }

    $idUser = $_SESSION['user']['id'];

    if (count($errors) === 0) {
        $data = [
            'id_user' => $idUser,
            'title' => $title,
            'author' => $author,
            'rate' => $rate,
            'cover_link' => $coverLink,
            'intro' => $intro,
            'body' => $body
        ];
        insertNotes($dbConnection, $data);
        header('Location: /library');
        exit();
    }
}
?>

<div class="container-fluid background-div">

    <?php include(__DIR__ . "/header.php"); ?>

    <div class="row text-center no-gutters mt-5">
        <div class="col">
            <h1>Create new notes for your books!</h1>
        </div>
    </div>

    <?php if(!empty($errors)) { ?>
        <div class="row d-flex align-items-center justify-content-center no-gutters">
            <div class="col alert alert-danger mt-3 error-message p-1" role="alert">
                <ul class="error-list">
                    <?php foreach($errors as $error) { ?>
                        <li> <?php echo htmlspecialchars($error, ENT_QUOTES);?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>

    <div class="row no-gutters mt-5">
        <div class="col-4 mx-auto">
            <form method="post">
                <div class="form-group">
                    <label for="title" class="label-form">Title</label>
                    <input type="text" name="title" class="form-control input-form" id="title" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="author" class="label-form">Author</label>
                    <input type="text" name="author" class="form-control input-form" id="author">
                </div>

                <div class="form-group">
                    <label for="rate" class="label-form">Rate</label>
                    <input type="range" list="tickmarks" min="1" max="10" name="rate" class="form-control input-form" id="rate">
                    <datalist id="tickmarks">
                    <option value="1" label="0%">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4"></option>
                    <option value="5" label="50%"></option>
                    <option value="6"></option>
                    <option value="7"></option>
                    <option value="8"></option>
                    <option value="9"></option>
                    <option value="10" label="100%"></option>
                    </datalist>
                </div>

                <div class="form-group">
                    <label for="cover_link" class="label-form">Cover Link</label>
                    <input type="text" name="cover_link" class="form-control input-form" id="cover_link">
                </div>

                <div class="form-group">
                    <label for="intro" class="label-form">Note's Intro</label>
                    <textarea name="intro" rows="4" class="form-control input-form" id="intro"></textarea>
                </div>

                <div class="form-group">
                    <label for="body" class="label-form">Note's Body</label>
                    <textarea name="body" rows="10" class="form-control input-form" id="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary signup-button mt-1 mb-3 ">CREATE NEW NOTE</button>

            </form>
        </div>
    </div>

</div>
