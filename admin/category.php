<?php include "component/header.php" ?>

    <!-- Block List Data -->
    <div class="block-add-data">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-end">
                <a href="general-view.php" class="btn btn-primary">
                    View Post
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 widget-scroll-y">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="btn-add-category" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "component/footer.php" ?>