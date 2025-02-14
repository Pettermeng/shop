<?php include "component/header.php" ?>

    <!-- Block List Data -->
    <div class="block-list-data">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-end">
                <a href="add-post.php" class="btn btn-primary">
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
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Image</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for($i=0; $i<100; $i++){
                                echo '
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <img src="https://placehold.co/150" alt="">
                                        </td>
                                        <td>@mdo</td>
                                        <td>
                                            <a href="" class="btn btn-success">Edit</a>
                                            <a href="javascript:void(0)" data-id="11" type="button" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">Remove</a>
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