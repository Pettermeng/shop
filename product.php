<?php include 'component/header.php'; ?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="thumbnail">
                        <img src="assets/image/card-thumbnail-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <figcaption class="py-3">
                        <h2>Loose Fit T-Shirts</h2>
                        <hr>
                        <div class="d-flex gap-3 mb-2">
                            <h5 class="regular-price text-red fw-500">
                               <strike>US $25</strike>
                            </h5>
                            <h5 class="sale-price fw-500">US $15</h5>
                        </div>
                        <hr>
                        <div class="cart-variant">
                            <div class="variant">
                                <h6>Size Available</h6>
                                <ul>
                                    <li class="disabled">S</li>
                                    <li>M</li>
                                    <li>L</li>
                                    <li>XL</li>
                                </ul>
                            </div>
                            <div class="cart">
                                <form action="" method="post">
                                    <input type="hidden" name="variant_id" value="1">
                                    <input type="submit" class="add-cart" value="Add to Cart">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h4>Product Description</h4>
                        <div>
                        Aenean eget placerat tellus. In luctus ipsum nec tortor cursus lacinia. Pellentesque pellentesque eget lacus at feugiat. Mauris condimentum, est et venenatis vulputate, risus ipsum congue erat, eget pretium ex arcu et velit. Fusce enim dui, sagittis vitae porta a, sodales non massa. Aliquam gravida arcu sit amet justo pellentesque eleifend. Sed dictum erat a ipsum tempor imperdiet. Vivamus euismod ex pulvinar metus vestibulum, eu sodales lectus iaculis. Morbi ultricies, ligula eu sagittis scelerisque, enim elit venenatis turpis, non efficitur magna nibh sit amet urna. Etiam quis aliquet velit.
                        </div>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>