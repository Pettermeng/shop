<!DOCTYPE html>
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
                        <ul>
                            <li class="active">
                                <img src="assets/image/home.svg" alt="">
                                <a href="">Dashboard</a>
                            </li>
                            <li>
                                <img src="assets/image/general.svg" alt="">
                                <a href="">General</a>
                            </li>
                            <li>
                                <img src="assets/image/product.svg" alt="">
                                <a href="">Product</a>
                            </li>
                            <li>
                                <img src="assets/image/category.svg" alt=""> 
                                <a href="">Category</a>
                            </li>
                            <li>
                                <img src="assets/image/order.svg" alt=""> 
                                <a href="">Order</a>
                            </li>
                            <li>
                                <img src="assets/image/social.svg" alt=""> 
                                <a href="">Social Media</a>
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
                </div>
            </div>
        </div>
    </body>
    <?php include "component/external-js-import.php" ?>
</html>