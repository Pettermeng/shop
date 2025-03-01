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
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Quantity</label>
                            <input type="number" name="qty" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Regular Price</label>
                            <input type="number" name="regular_price" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Sale Price</label>
                            <input type="number" name="sale_price" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Size</label>
                            <input type="text" name="size" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Color</label>
                            <input type="color" name="color" class="form-control" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="title">Category</label>
                            <select name="category" id="" class="form-control">
                                <?php
                                    $category = get_category();
                                    while($row = mysqli_fetch_assoc($category)) {
                                        echo '
                                            <option value="'.$row['id'].'">'.$row['name'].'</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="content">Content</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="btn-add-product" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "component/footer.php" ?>