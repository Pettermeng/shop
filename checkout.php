<?php 
    include 'component/header.php';
    $address = user_address();
?>

<main class="checkout">
    <section>
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>Checkout</h3>
            </div>
            <div class="row">
                <div class="col-8">
                    <form action="" method="post" class="user-info">
                        <h6 class="d-flex align-items-center gap-3 mb-4">
                            <div class="number d-flex align-items-center justify-content-center">1</div>
                            <div class="title">PERSONAL INFORMATION (Shipping Address)</div>
                        </h6>

                        <div class="row gap-3 mb-4">
                            <div class="col-12">
                                <label for="" class="mb-2">Username</label>
                                <input type="text" class="box rounded-1" value="<?php echo $address['name'] ?>" name="name" placeholder="John Doe">
                            </div>
                            <div class="col-12">
                                <label for="" class="mb-2">Phone</label>
                                <input type="text" class="box rounded-1" value="<?php echo $address['phone'] ?>" name="phone" placeholder="012345678">
                            </div>
                            <div class="col-12">
                                <label for="" class="mb-2">Address</label>
                                <textarea name="address" id="" class="box rounded-1" rows="5" placeholder="Street 123, House 456, Phnom Penh, Cambodia"><?php echo $address['location'] ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex align-items-center gap-3 mb-2">
                                    <div class="number d-flex align-items-center justify-content-center">2</div>
                                    <div class="title">PAYMENT METHOD</div>
                                </h6>
                                <div class="cod d-flex align-items-center gap-3">
                                    <img src="assets/image/motor.svg" alt="">
                                    <div>Cash on Delivery</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-4">
                                <button type="submit" name="btn-save-address" class="px-2 py-1 rounded-1">
                                    Add | Update Address
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-1"></div>
                <div class="col-3">
                    <div class="summary">
                        <h4 class="mb-4">YOUR ORDER</h4>
                        <hr>
                        <?php
                            $cart = get_cart_by_user();
                        ?>
                        <ul>
                        <?php
                            foreach($cart['product'] as $product) {
                                if($product['sale_price'] > 0) {
                                    $price = $product['sale_price'];
                                }
                                else {
                                    $price = $product['regular_price'];
                                }
                                echo '
                                    <li>
                                        <h6 class="mb-0">'.$product['name'].'</h6>
                                        <h6 class="mb-0 t-black">$'.$price.'</h6>
                                    </li>
                                ';
                            }
                        ?>
                        </ul>
                        <hr>
                        <ul>
                            <li>
                                <h5 class="mb-0">Shipping Price</h5>
                                <h6 class="mb-0 t-black">$<?php echo $cart['shipping_fee'] ?></h6>
                            </li>
                        </ul>
                        <hr>
                        <ul>
                            <li>
                                <h5 class="mb-0">Total</h5>
                                <h6 class="mb-0 t-black">$<?php echo $cart['cart_total'] ?></h6>
                            </li>
                        </ul>
                        <hr>
                        <div class="col-12 d-flex justify-content-end">
                            <form action="" method="post">
                                <button type="submit" name="btn-placeorder"class="px-2 py-1 rounded-1">
                                    Place Order
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>