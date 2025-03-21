<?php include 'function.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CodeLab Academy</title>
        <!-- theme style -->
         <link rel="stylesheet" href="assets/css/theme.css">
         <link rel="stylesheet" href="assets/css/login.css">
         <link rel="stylesheet" href="assets/css/product.css">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <header class="py-2">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a href="/project">
                        <?php 
                            $logo = get_general_setting();
                            echo '
                                <img src="../shop/admin/assets/upload/'. $logo['header_logo'] .'" alt="" style="width: 120px">
                            ';
                        ?>
                    </a>
                </div>
                <ul class=" d-flex align-items-center justify-content-between gap-5">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                        <a href="shop.php?product=promotion">Promotion</a>
                    </li>
                </ul>
                <div class="other d-flex align-items-center gap-3">
                    <div class="account">
                        <a href="cart.php" class="">
                            <img src="assets/image/cart.svg" alt="">
                        </a>
                        <?php
                            if(empty($_SESSION['user_id'])) {
                                echo '
                                    <a href="login.php" class="user-account">Login | Register</a>
                                ';
                            }
                            else {
                                echo '
                                    <a href="account.php" class="user-account">Account</a>
                                    <a href="cart.php" class="user-account">Cart</a>
                                ';
                            }
                        ?>
                    </div>
                    <div class="search">
                        <img src="assets/image/search.svg" alt="">
                    </div>
                </div>
            </div>
        </header>