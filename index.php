<?php include 'component/header.php'; ?>
        
<main>

    <!-- Hero Banner -->
    <section>
        <div class="container">
            <figure>
                <?php 
                    $banner = get_general_setting();
                    echo '
                        <img src="/shop/admin/assets/upload/'. $banner['banner'] .'" alt="" class="rounded-1 w-100">
                    ';
                ?>
            </figure>
        </div>
    </section>

    <!-- Product 4 cards -->
    <section class="card-4">
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>New Products</h3>
            </div>
            <div class="row">
                <?php
                    $new_product = get_new_product_4("");
                    while($row = mysqli_fetch_assoc($new_product)) {
                        
                        // check promotion
                        $sale_price = $row['sale_price'];
                        if($sale_price > 0) {
                            $status = '
                                <div class="discount-status rounded-1 py-1 px-2">
                                    Discount
                                </div>
                            ';
                            $price_status = '
                                <div class="regular-price text-red fw-500"><strike>US $'.$row['regular_price'].'</strike></div>
                                <div class="sale-price fw-500">US $'.$row['sale_price'].'</div>
                            ';
                        }
                        else {
                            $status = '';
                            $price_status = '
                                <div class="sale-price fw-500">US $'.$row['regular_price'].'</div>
                            ';
                        }

                        echo '
                            <div class="col-3">
                                <figure>
                                    <a href="product.php?post='. $row['id'] .'">
                                        <div class="thumbnail">
                                            '. $status .'
                                            <img src="/shop/admin/assets/upload/'. $row['image'] .'" alt="" class="w-100">
                                        </div>
                                        <figcaption class="py-3">
                                            <div class="d-flex gap-3 mb-2">
                                                '. $price_status .'
                                            </div>
                                            <h6>'.$row['name'].'</h6>
                                        </figcaption>
                                    </a>
                                </figure>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Product 4 cards -->
    <section class="card-4">
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>Promotion Products</h3>
            </div>
            <div class="row">
                <?php
                    $new_product = get_new_product_4("discount");
                    while($row = mysqli_fetch_assoc($new_product)) {
                        
                        // check promotion
                        $sale_price = $row['sale_price'];
                        if($sale_price > 0) {
                            $status = '
                                <div class="discount-status rounded-1 py-1 px-2">
                                    Discount
                                </div>
                            ';
                            $price_status = '
                                <div class="regular-price text-red fw-500"><strike>US $'.$row['regular_price'].'</strike></div>
                                <div class="sale-price fw-500">US $'.$row['sale_price'].'</div>
                            ';
                        }
                        else {
                            $status = '';
                            $price_status = '
                                <div class="sale-price fw-500">US $'.$row['regular_price'].'</div>
                            ';
                        }

                        echo '
                            <div class="col-3">
                                <figure>
                                    <a href="product.php?post='. $row['id'] .'">
                                        <div class="thumbnail">
                                            '. $status .'
                                            <img src="/shop/admin/assets/upload/'. $row['image'] .'" alt="" class="w-100">
                                        </div>
                                        <figcaption class="py-3">
                                            <div class="d-flex gap-3 mb-2">
                                                '. $price_status .'
                                            </div>
                                            <h6>'.$row['name'].'</h6>
                                        </figcaption>
                                    </a>
                                </figure>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Category 4 cards -->
    <section class="card-4 category">
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>Our Categories</h3>
            </div>
            <div class="marquee-container">
                <div class="marquee-content">
                    <div class="row">
                        <?php 
                            $category = get_category();
                            while($row = mysqli_fetch_assoc($category)) {
                                echo '
                                    <div class="col-3">
                                        <figure>
                                            <a href="shop.php?category='.$row['id'].'">
                                                <div class="thumbnail relative d-flex align-items-center justify-content-center">
                                                    <img src="/shop/admin/assets/upload/'. $row['image'] .'" alt="" class="w-100">
                                                    <figcaption>'. $row['name'] .'</figcaption>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'component/footer.php'; ?>