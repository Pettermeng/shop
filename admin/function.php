<?php
    session_start();
    // Connection to DB
    $con = new mysqli('localhost', 'root', '', 'php_shop');

    // Register Account Admin
    function register_admin() {
        global $con;
        if(isset($_POST['btn-register'])) {
            $name     = $_POST['username'];
            $phone    = $_POST['phone'];
            $password = md5($_POST['password']);
            $date     = date('Y-m-d');

            $sql = "
                INSERT INTO `user`(`name`, `phone`, `password`, `role_id`, `address_id`, `created_at`, `updated_at`) 
                VALUES ('". $name ."', '". $phone ."', '". $password ."', 1, 1, '". $date ."', '". $date ."')
            ";

            $result = $con->query($sql);            
            if($result) {
                header('Location: login.php');
            } 
        }
    }
    register_admin();

    // Login Admin
    function login_admin() {
        global $con;
        if(isset($_POST['btn-login'])) {
            $name     =  $_POST['username'];
            $password =  md5($_POST['password']);

            $sql = "
                SELECT * FROM `user` 
                    WHERE (name='". $name ."' OR phone='". $name ."') 
                    AND password='". $password ."' 
                    AND role_id = 1
            ";
            $result = $con->query($sql);
            $exist_user = mysqli_num_rows($result);
            if($exist_user > 0) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['id'];
                $_SESSION['user_id']= $user_id; 
                header('Location: index.php');
            }
            else {
                echo 'Invalid user';
            }
        }
    } 
    login_admin();

    // Get Current User 
    function get_current_user_name(){
        global $con;
        $user_id  = $_SESSION['user_id'];
        $sql      = "SELECT * FROM  user WHERE id = $user_id";
        $result   = $con->query($sql);
        $row      = mysqli_fetch_assoc($result);
        $username = $row['name'];
        return $username;
    } 

    // move file
    function move_file($file) {
        $file_name   = rand(1, 999).'-'.$file['name'];
        $source_file = $file['tmp_name'];
        $path        = 'assets/upload/'.$file_name;
        move_uploaded_file($source_file, $path);
        return $file_name;
    }

    // Insert General
    function insert_general() {
        global $con;
        if(isset($_POST['btn-add-general'])) {
            $shipping_fee = $_POST['shipping_fee'];

            $main_banner      = $_FILES['main_banner'];
            $main_banner_name = move_file($main_banner);
            
            $header_logo      = $_FILES['header_logo'];
            $header_logo_name = move_file($header_logo);

            $footer_logo      = $_FILES['footer_logo'];
            $footer_logo_name = move_file($footer_logo);
            
            $date = date('Y-m-d');
            
            $sql = "
                INSERT INTO `general`(`banner`, `header_logo`, `footer_logo`, `shipping_fee`, `created_at`, `updated_at`) 
                VALUES ('". $main_banner_name ."','". $header_logo_name ."', '". $footer_logo_name ."', '". $shipping_fee ."', '". $date ."', '". $date ."' )
            ";

            $result = $con->query($sql);
            if($result) {
                echo 'Insert success';
            }
            else {
                echo 'Error';
            }
        }
    }
    insert_general();

    function list_general() {
        global $con;
        $sql = "SELECT * FROM general";
        $result = $con->query($sql);
        return $result;
    } 

    function update_general() {
        global $con;
        if(isset($_POST['btn-update-general'])) {
            $id           = $_POST['id'];
            $shipping_fee = $_POST['shipping_fee'];
            
            $header_logo      = $_FILES['header_logo'];
            $header_logo_name = move_file($header_logo);

            $footer_logo      = $_FILES['footer_logo'];
            $footer_logo_name = move_file($footer_logo);
            $date = date('Y-m-d');
            
            $sql = "
                UPDATE `general` SET 
                    `header_logo`='" . $header_logo_name ."',
                    `footer_logo`='" . $footer_logo_name ."',
                    `shipping_fee`='" . $shipping_fee ."',
                    `created_at`='" . $date ."',
                    `updated_at`='" . $date ."' 
                WHERE id = $id
            ";

            $result = $con->query($sql);
            if($result) {
                header('Location: general-view.php');
            }
            else {
                echo 'Error';
            }
        }
    }
    update_general();

    // Get current post by id
    function get_post_by_id($table, $id) {
        global $con;
        $sql    = "SELECT * FROM $table WHERE id = $id";
        $result = $con->query($sql);
        return $result;
    } 

    // Remove Post
    function remove_post() {
        global $con;
        if(isset($_POST['btn-remove'])) {
            $model = $_POST['remove-model'];
            $id    = $_POST['remove-id'];

            $sql = "DELETE FROM $model WHERE id = $id";
            $result = $con->query($sql);
            if($result) {
                if($model == 'general') {
                    header('Location: general-view.php');
                }
            }
            else {
                echo 'Error';
            }
        }
    }
    remove_post();

    // Insert category
    function insert_category() {
        global $con;
        if(isset($_POST['btn-add-category'])) {
            $name = $_POST['name'];
            $image = $_FILES['image'];
            $image_name = move_file($image);
            $date = date('Y-m-d');
            
            $sql = "
                INSERT INTO `category`(`name`, `image`, `created_at`, `updated_at`) 
                VALUES ('". $name ."', '". $image_name ."', '". $date ."', '". $date ."' )
            ";
            $result = $con->query($sql);
            if($result) {
                echo 'Post inserted';
            }
        }
    }
    insert_category();

    // Get category
    function get_category() {
        global $con;
        $sql = "SELECT * FROM category ORDER BY id DESC";
        $result = $con->query($sql);
        return $result;
    }

    // Insert Product
    function insert_product() {
        global $con;
        if(isset($_POST['btn-add-product'])) {
            $name = $_POST['name'];
            $qty = $_POST['qty'];
            $regular_price = $_POST['regular_price'];
            $sale_price = $_POST['sale_price'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $image = $_FILES['image'];
            $image_name = move_file($image);
            $date = date('Y-m-d');
            $user_id = $_SESSION['user_id'];
            
            $sql = "
                INSERT INTO `product`(`name`, `qty`, `regular_price`, `sale_price`, `size`, `color`, `category_id`, `author_id`, `image`, `is_deleted`, `description`, `created_at`, `updated_at`) 
                VALUES ('".$name."', ".$qty.", ".$regular_price.", ".$sale_price.", '".$size."', '".$color."', ".$category.", ".$user_id.", '".$image_name."', 1, '".$description."','".$date."','".$date."' )
            ";
            $result = $con->query($sql);
            if($result) {
                echo 'Post Inserted';
            }
        }
    }
    insert_product();

    // get list order
    function get_order() {
        global $con;
        $sql = "
            SELECT order_product.*, user.name
            FROM order_product INNER JOIN user
            ON order_product.user_id = user.id
            ORDER BY order_product.id DESC
        ";
        $rs = $con->query($sql);
        return $rs;
    }

    function get_order_info($order_id) {
        global $con;
        $sql = "
            SELECT 
                order_product.invoice_id, 
                order_product.shipping_fee, 
                order_product.total, 
                order_product.order_status,
                shipping_address.name, 
                shipping_address.phone, 
                shipping_address.location
            FROM 
                order_product 
                INNER JOIN user ON order_product.user_id = user.id
                INNER JOIN shipping_address ON shipping_address.user_id = user.id
            WHERE 
                order_product.id = $order_id
        ";
        $rs = $con->query($sql);
        while($row = mysqli_fetch_assoc($rs)) {
            return $row;
        }
    }

    function get_list_order_item($order_id) {
        global $con;
        $sql = "
            SELECT order_item.*, product.name, product.sale_price, product.regular_price
            FROM order_item INNER JOIN product
            ON order_item.product_id = product.id
            WHERE order_item.order_id = $order_id
        ";
        $rs  = $con->query($sql);
        while($row = mysqli_fetch_assoc($rs)) {
            $order_item[] = $row;
        }
        return $order_item;
    }

    // action confim - reject order
    function confirm_reject_order() {
        global $con;
        if(isset($_POST['btn-confirm']) || isset($_POST['btn-reject'])) {
            $order_id = $_POST['order_id'];
            if(isset($_POST['btn-confirm'])) {
                $status = 'complete';
            }
            if(isset($_POST['btn-reject'])) {
                $status = 'cancel';
            }
            $sql = "UPDATE `order_product` SET `order_status`='".$status."' WHERE id = $order_id";
            $con->query($sql);
        }
    }
    confirm_reject_order();

?>