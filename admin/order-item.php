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
                <?php
                    $order_info = get_order_info($_GET['id'])
                ?>
                <div class="row mb-2">
                    <div class="col-2">Invoice ID :</div>
                    <div class="col-10 mb-2"><b>#<?php echo $order_info['invoice_id'] ?></b></div>
                    <div class="col-2">Customer :</div>
                    <div class="col-10 mb-2"><b><?php echo $order_info['name'] ?></b></div>
                    <div class="col-2">Phone :</div>
                    <div class="col-10 mb-2"><b><?php echo $order_info['phone'] ?></b></div>
                    <div class="col-2">Address :</div>
                    <div class="col-10 mb-2"><b><?php echo $order_info['location'] ?></b></div>
                    <div class="col-2">Shipping Price :</div>
                    <div class="col-10 mb-2"><b>$<?php echo $order_info['shipping_fee'] ?></b></div>
                    <div class="col-2">Total Amount :</div>
                    <div class="col-10 mb-2"><b>$<?php echo $order_info['total'] ?></b></div>
                    <div class="col-2">Order Status :</div>
                    <div class="col-10 mb-2"><b><?php echo $order_info['order_status'] ?></b></div>
                </div>
                <?php
                    if($order_info['order_status'] == 'processing') {
                        echo '
                            <div class="row mb-2">
                                <div class="col-12">
                                    <form action="" method="post">
                                        <input type="hidden" value="'.$_GET['id'].'" name="order_id">
                                        <input type="submit" class="btn btn-success" name="btn-confirm" value="Confirm">
                                        <input type="submit" class="btn btn-danger" name="btn-reject" value="Reject">
                                    </form>
                                </div>
                            </div>
                        ';
                    }
                ?>
                
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
                            $item = get_list_order_item($_GET['id']);
                            foreach($item as $value) {

                                if($value['sale_price'] > 0) {
                                    $price = $value['sale_price'];
                                }
                                else {
                                    $price = $value['regular_price'];
                                }

                                echo '
                                    <tr>
                                        <td>'.$value['name'].'</td>
                                        <td>$'.$price.'</td>
                                        <td>'.$value['qty'].'</td>
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