<?php include "component/header.php" ?>

    <!-- Block List Data -->
    <div class="block-list-data">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-end">
                <a href="general.php" class="btn btn-primary">
                    Add New
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 widget-scroll-y">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Shipping Fee</th>
                            <th scope="col">Header Logo</th>
                            <th scope="col">Footer Logo</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $general = list_general();
                            while($row = mysqli_fetch_assoc($general)) {
                                echo '
                                    <tr>
                                        <th scope="row">'. $row['id'] .'</th>
                                        <td>'. $row['shipping_fee'] .' $</td>
                                        <td>
                                            <img src="assets/upload/'. $row['header_logo'] .'" alt="">
                                        </td>
                                        <td>
                                            <img src="assets/upload/'. $row['footer_logo'] .'" alt="">
                                        </td>
                                        <td>
                                            <a href="general-update.php?id='. $row['id'] .'" class="btn btn-success">Edit</a>
                                            <a href="javascript:void(0)" data-model="general" data-id="'. $row['id'] .'" type="button" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">Remove</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "component/modal-popup.php" ?>
<?php include "component/footer.php" ?>