<?php include "component/header.php" ?>

    <!-- Block List Data -->
    <div class="block-add-data order-item">
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
                <div class="title d-flex align-items-center gap-3 mb-3">
                    <img src="assets/image/announcement.svg" alt="">
                    <h3 class="mb-0">Order Received</h3>
                </div>
                <div class="row mb-2">
                    <div class="col-2">Order ID :</div>
                    <div class="col-10 mb-2"><b>#INV00001</b></div>
                    <div class="col-2">Customer :</div>
                    <div class="col-10 mb-2"><b>Heng Sokchanthy</b></div>
                    <div class="col-2">Phone :</div>
                    <div class="col-10 mb-2"><b>012 454 778</b></div>
                    <div class="col-2">Address :</div>
                    <div class="col-10 mb-2"><b>Street 123, Borey Piphup tmey, Phnom Penh</b></div>
                    <div class="col-2">Shipping Price :</div>
                    <div class="col-10 mb-2"><b>$2</b></div>
                    <div class="col-2">Total Amount :</div>
                    <div class="col-10 mb-2"><b>$34</b></div>
                    <div class="col-2">Order Status :</div>
                    <div class="col-10 mb-2"><b>Processing</b></div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <form action="" method="post">
                            <input type="submit" class="btn btn-success" value="Confirm">
                            <input type="submit" class="btn btn-danger" value="Reject">
                        </form>
                    </div>
                </div>
                <hr>
                <table class="mt-3 table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for($i=1; $i<5; $i++){
                                echo '
                                    <tr>
                                        <td>Product 00'.$i.'</td>
                                        <td>$12</td>
                                        <td>2</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

<?php include "component/footer.php" ?>