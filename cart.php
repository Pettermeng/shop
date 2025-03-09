<?php include 'component/header.php'; ?>

<main class="cart">
    <section>
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>Cart</h3>
            </div>
            <div class="row">
                <?php
                    $product =  get_cart_by_user();
                    foreach($product['product'] as $product_value) {
                        echo '
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <figure class="d-flex align-items-center gap-3">
                                    <img src="/shop/admin/assets/upload/'.$product_value['image'].'" alt="" >
                                    <h4>'. $product_value['name'] .'</h4>
                                </figure>
                                <figcaption class="d-flex align-items-center gap-3">
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="'.$product_value['id'].'">
                                        <button type="submit" name="btn-remove-cart">
                                            <img src="assets/image/cancel.svg" alt="">
                                        </button>
                                    </form>
                                </figcaption>
                            </div>
                            <hr>
                        ';
                    }
                ?>
                <div class="col-12 d-flex justify-content-end">
                    <a href="checkout.php" class="btn-checkout">Checkout Now</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>