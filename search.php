<?php 
    include 'component/header.php'; 
    $search = $_GET['search'];
?>
        
<main>

    <!-- Product 4 cards -->
    <section class="card-4">
        <div class="container">
            <div class="highlight-title mb-4">
                <h3>New Products</h3>
            </div>
            <div class="row">
                <?php
                    $search_value = search_product($search);
                    while($row = mysqli_fetch_assoc($search_value)) {
                        
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

</main>

<?php include 'component/footer.php'; ?>