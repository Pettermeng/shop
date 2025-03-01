<?php 
    include 'component/header.php'; 
    $post_id = $_GET['post'];
    $product = get_product_by_id($post_id);

    $sale_price = $product['sale_price'];
    if($sale_price > 0) {
        $price_status = '
            <h5 class="regular-price text-red fw-500">
                <strike>US $'.$product['regular_price'].'</strike>
            </h5>
            <h5 class="sale-price fw-500">US $'.$product['sale_price'].'</h5>
        ';
    }
    else {
        $price_status = '
            <h5 class="sale-price fw-500">US $'.$product['regular_price'].'</h5>
        ';
    }
?>

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
                        <h2><?php echo $product['name'] ?></h2>
                        <hr>
                        <div class="d-flex gap-3 mb-2">
                            <?php echo $price_status; ?>
                        </div>
                        <hr>
                        <div class="cart-variant">
                            <div class="variant">
                                <h6>Color Available</h6>
                                <ul class="color">
                                    <li>
                                        <div class="circle mb-1" style="background: <?php echo $product['color'] ?>;"></div>
                                    </li>
                                </ul>
                                <h6>Size Available</h6>
                                <ul>
                                    <li><?php echo $product['size'] ?></li>
                                </ul>
                            </div>
                            <div class="cart">
                                <form action="" method="post">
                                    <input type="hidden" name="product-id" value="1">
                                    <input type="number" class="qty" name="quantity" value="1" min="1">
                                    <input type="submit" class="add-cart" value="Add to Cart">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h4>Product Description</h4>
                        <div><?php echo $product['description'] ?></div>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>