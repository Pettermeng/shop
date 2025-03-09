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
                                
                            }
                        ?>
                        <li>
                            <div class="order-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <h5 class="m-0">#INV-0001</h5>
                                <h6 class="m-0">Status: Processing</h6>
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
                                        for($i=0; $i<5; $i++){
                                            echo '
                                                <tr>
                                                    <td>T-Short 001</td>
                                                    <td>2</td>
                                                    <td>$12</td>
                                                    <td>$24</td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </table>
                                <div class="d-flex flex-column align-items-end justify-content-end gap-2 py-3">
                                    <h6 class="m-0">Shipping Fee: $1</h6>
                                    <h6 class="m-0">Total: $120</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>