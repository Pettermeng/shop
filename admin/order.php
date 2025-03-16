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
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Cutomer</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $order = get_order();
                            while($row = mysqli_fetch_assoc($order)) {
                                echo '
                                    <tr>
                                        <th scope="row">'.$row['invoice_id'].'</th>
                                        <td>'.$row['name'].'</td>
                                        <td>$'.$row['total'].'</td>
                                        <td>'.$row['order_status'].'</td>
                                        <td>
                                            <a href="order-item.php?id='.$row['id'].'" class="btn btn-success">View</a></td>
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