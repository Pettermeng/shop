<!DOCTYPE html>
<?php
    $current_page = basename($_SERVER['PHP_SELF'], ".php");
?>
<script>
    var currentPage = "<?php echo $current_page; ?>";
</script>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="assets/css/theme.css">
        <?php include "component/external-css-import.php" ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row dashboard">
                <div class="col-2 sidebar">
                    <div class="top logo">
                        <h3>CodeLab Academy</h3>
                    </div>
                    <hr>
                    <div class="bottom">
                        <ul class="menu">
                            <li data-page="index">
                                <img src="assets/image/home.svg" alt="">
                                <a href="index.php">Dashboard</a>
                            </li>
                            <li data-page="general">
                                <img src="assets/image/general.svg" alt="">
                                <a href="general.php">General</a>
                            </li>
                            <li data-page="product">
                                <img src="assets/image/product.svg" alt="">
                                <a href="product.php">Product</a>
                            </li>
                            <li data-page="category">
                                <img src="assets/image/category.svg" alt=""> 
                                <a href="category.php">Category</a>
                            </li>
                            <li data-page="order">
                                <img src="assets/image/order.svg" alt=""> 
                                <a href="order.php">Order</a>
                            </li>
                            <li data-page="social">
                                <img src="assets/image/social.svg" alt=""> 
                                <a href="social.php">Social Media</a>
                            </li>
                        </ul>

                    </div>
                    <hr>
                    <ul>
                        <li>
                            <img src="assets/image/logout.svg" alt="">
                            <a href="" class="logout">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-10 content">
                    <div class="top">
                        <h6>Welcome back <label>[ Petter Meng ]</label></h6>
                    </div>
                    <hr>