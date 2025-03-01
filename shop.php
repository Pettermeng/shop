<?php include 'component/header.php'; ?>

<!-- Product 4 cards -->
<section class="card-4">
    <div class="container">
        <div class="highlight-title mb-4">
            <h3>Products</h3>
        </div>
        <div class="row">
            <div class="col-9">
                 <div class="row">
                    <?php
                        $new_product = get_product_by_pagination();
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
                                <div class="col-4">
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
                <div class="row">
                    <div class="pagination">
                        <ul class="d-flex gap-3 align-items-center">
                            <?php
                                $total_page = get_pagination();
                                for($i=1; $i<=$total_page; $i++) {
                                    echo '
                                        <li>
                                            <a href="?page='. $i .'">'.$i.'</a>
                                        </li>
                                    ';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="sidebar">
                    <div>
                        <h4 class="mb-3">Category</h4>
                        <ul>
                            <?php
                                $category = get_category();
                                while($row = mysqli_fetch_assoc($category)) {
                                    echo '
                                        <li>
                                            <a href="?category='. $row['id'] .'">'. $row['name'] .'</a>
                                        </li>
                                    ';
                                } 
                            ?>
                        </ul>
                    </div>
                    <hr>
                    <div>
                        <a href="?promotion=true" class="promotion">Promotion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'component/footer.php'; ?>