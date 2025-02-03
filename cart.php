<?php include 'component/header.php'; ?>

<main class="cart">
    <section>
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>Cart</h3>
            </div>
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <figure class="d-flex align-items-center gap-3">
                        <img src="assets/image/card-thumbnail-04.jpg" alt="" >
                        <h4>Loose Fit T-Shirts</h4>
                    </figure>
                    <figcaption class="d-flex align-items-center gap-3">
                        <h5 class="mb-0">US $15</h5>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="1">
                            <button type="submit">
                                <img src="assets/image/cancel.svg" alt="">
                            </button>
                        </form>
                    </figcaption>
                </div>
                <hr>
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <figure class="d-flex align-items-center gap-3">
                        <img src="assets/image/card-thumbnail-04.jpg" alt="" >
                        <h4>Loose Fit T-Shirts</h4>
                    </figure>
                    <figcaption class="d-flex align-items-center gap-3">
                        <h5 class="mb-0">US $15</h5>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="1">
                            <button type="submit">
                                <img src="assets/image/cancel.svg" alt="">
                            </button>
                        </form>
                    </figcaption>
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                    <a href="checkout.php" class="btn-checkout">Checkout Now</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>