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
                            <label for="title">Shipping Fee</label>
                            <input type="text" name="shipping_fee" class="form-control" placeholder="Shipping Fee ($)">
                        </div>
                        <div class="col-12">
                            <label for="image">Main Banner</label>
                            <input type="file" name="main_banner" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="image">Header Logo</label>
                            <input type="file" name="header_logo" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="image">Footer Logo</label>
                            <input type="file" name="footer_logo" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="btn-add-general" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "component/footer.php" ?>