<?php 
    include 'component/header.php'; 
    $user = customer_profile();
?>

<main class="account">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>WELCOME TO YOUR ACCOUNT: [ <?php echo $user['name'] ?> ]</h3>
                    <hr>
                    <h3>Your Order</h3>
                    <ul class="mt-4 list-order">
                        <?php
                            $order = order_history();
                            while($row = mysqli_fetch_assoc($order)) {
                        ?>
                        <li>
                            <div class="order-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <h5 class="m-0">#<?php echo $row['invoice_id'] ?></h5>
                                <h6 class="m-0">Status: <?php echo $row['order_status'] ?></h6>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <table border="1px">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    <?php
                                       $order_item = get_product_by_order_id($row['id']);
                                       foreach($order_item as $value) {

                                        if($value['sale_price'] > 0) {
                                            $price = $value['sale_price'];
                                        }
                                        else {
                                            $price = $value['regular_price'];
                                        }

                                        $sub_total = $value['qty'] * $price;

                                        echo '
                                            <tr>
                                                <td>'.$value['name'].'</td>
                                                <td>'.$value['qty'].'</td>
                                                <td>$'.$price.'</td>
                                                <td>$'.$sub_total.'</td>
                                            </tr>
                                        ';
                                       }
                                    ?>
                                </table>
                                <div class="d-flex flex-column align-items-end justify-content-end gap-2 py-3">
                                    <h6 class="m-0">Shipping Fee: $<?php echo $row['shipping_fee'] ?></h6>
                                    <h6 class="m-0">Total: $<?php echo $row['total'] ?></h6>
                                </div>
                            </div>
                        </li>
                        <?php
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>