<div class="container-fluid background-div">

    <?php include(__DIR__ . "/header.php"); ?>

    <div class="row text-center no-gutters mt-5">
        <div class="col">
            <h1>Create new notes for your books!</h1>
        </div>
    </div>

    <div class="row no-gutters mt-5">
        <div class="col-4 mx-auto">
            <form>
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
                    <input type="text" name="rate" class="form-control input-form" id="rate">
                </div>

                <div class="form-group">
                    <label for="cover_link" class="label-form">Cover Link</label>
                    <input type="text" name="cover-link" class="form-control input-form" id="cover-link">
                </div>

                <div class="form-group">
                    <label for="intro" class="label-form">Note's Intro</label>
                    <textarea name="intro" rows="4" class="form-control input-form" id="intro"></textarea>
                </div>

                <div class="form-group">
                    <label for="note-body" class="label-form">Note's Body</label>
                    <textarea name="note-body" rows="10" class="form-control input-form" id="note-body"></textarea>
                </div>

            </form>
        </div>
    </div>

</div>
