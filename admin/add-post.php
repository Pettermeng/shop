<?php include "component/header.php" ?>

    <!-- Block List Data -->
    <div class="block-add-data">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-end">
                <a href="list-post.php" class="btn btn-primary">
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
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col-12">
                            <label for="title">Category</label>
                            <select name="category" id="" class="form-control">
                                <option value="">Men</option>
                                <option value="">Women</option>
                                <option value="">Boy</option>
                                <option value="">Girl</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="content">Content</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "component/footer.php" ?>