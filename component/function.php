<?php
    session_start();
    // Connection to DB
    $con = new mysqli('localhost', 'root', '', 'php_shop');

    // Get general setting
    function get_general_setting() {
        global $con;
        $sql = "SELECT * FROM general ORDER BY id DESC LIMIT 1";
        $result = $con->query($sql);
        $row  = mysqli_fetch_assoc($result);
        return $row;
    } 

    // Get new products 4
    function get_new_product_4($is_discount) {
        global $con;

        if($is_discount != '') {
            $sql_condition = "AND sale_price > 0";
        }
        else {
            $sql_condition = "";
        }

        $sql    = "SELECT * FROM product WHERE is_deleted = 1 ". $sql_condition ." ORDER BY id DESC LIMIT 4";
        $result = $con->query($sql);
        return $result;
    }

    // Get list category
    function get_category() {
        global $con;
        $sql    = "SELECT * FROM category ORDER BY id DESC";
        $result = $con->query($sql);
        return $result;
    }

    // Get product by id
    function get_product_by_id($post_id) {
        global $con;
        $sql    = "SELECT * FROM product WHERE id = $post_id";
        $result = $con->query($sql);
        $row    = mysqli_fetch_assoc($result);
        return $row;
    }

    // Get list product by pagination 
    function get_product_by_pagination() {
        global $con;
        
        if(isset($_GET['category'])) {
            $cat_id = $_GET['category'];
            $sql = "SELECT * FROM product WHERE is_deleted = 1 AND category_id = $cat_id ORDER BY id DESC";
        }
        else if(isset($_GET['promotion'])) {
            $sql = "SELECT * FROM product WHERE is_deleted = 1 AND sale_price > 0 ORDER BY id DESC";
        }
        else {
            if(!isset($_GET['page'])) {
                $current_page = 1;
            }
            else {
                $current_page = $_GET['page'];
            }
            $limit  = 3;
            $offset = ($current_page - 1) * $limit;
            $sql    = "SELECT * FROM product WHERE is_deleted = 1 ORDER BY id DESC LIMIT $limit OFFSET $offset";
        }

        $result = $con->query($sql);
        return $result;
    }

    // Get pagiation
    function get_pagination() {
        global $con;
        $post_per_page = 3;
        $sql    = "SELECT COUNT(*) AS total_post FROM product WHERE is_deleted = 1";
        $result = $con->query($sql);
        $row    = mysqli_fetch_assoc($result);
        $total_post = $row['total_post'];
        $total_page = ceil($total_post / $post_per_page); 
        return $total_page;
    }

    // search product
    function search_product($search_value) {
        global $con;
        $value = $search_value;
        $sql = "SELECT * FROM product WHERE name LIKE '%".$value."%'";
        $result = $con->query($sql);
        return $result;
    }

    // customer register account
    function customer_register_account() {
        global $con;
        if(isset($_POST['btn-user-register'])) {
            $name     = $_POST['username'];
            $phone    = $_POST['phone'];
            $password = md5($_POST['password']);
            $role     = 2;
            $date     = date('Y-m-d');
            
            $sql = "
                INSERT INTO `user`(`name`, `phone`, `password`, `role_id`, `address_id`, `created_at`, `updated_at`) 
                VALUES ('".$name."', '".$phone."', '".$password."', ".$role.", 1, '".$date."', '".$date."' )
            ";
            $result = $con->query($sql);
            if($result) {
                echo '
                    <div class="alert-msg success d-none">
                        Account Create Successfully!
                    </div>
                ';
            }
            else {
                echo '
                    <div class="alert-msg error">
                        Account Create Failed!
                    </div>
                ';
            }
        }
    }

    // customer login account
    function customer_login_account() {
        global $con;
        if(isset($_POST['btn-user-login'])) {
            $phone_username = $_POST['phone_username'];
            $password       = md5($_POST['password']);
            $sql = "SELECT * FROM `user` WHERE (name = '".$phone_username."' OR phone = '".$phone_username."') AND password = '".$password."'";
            $result = $con->query($sql);
            $exist_user = mysqli_num_rows($result);

            if($exist_user > 0) {
                $row     = mysqli_fetch_assoc($result);
                $user_id = $row['id'];
                $_SESSION['user_id'] = $user_id; 
                header('Location: account.php');
            }
            else {
                echo 'Invalid user';
            }

        }
    }
    customer_login_account();

    // customer profile
    function customer_profile() {
        global $con;
        $user_id = $_SESSION['user_id'];
        $sql     = "SELECT * FROM user WHERE id = $user_id";
        $result  = $con->query($sql);
        $row     = mysqli_fetch_assoc($result);
        return $row;
    }

    // Customer add prduc to cart
    function add_to_cart() {
        global $con;
        if(isset($_POST['btn-add-cart'])) {
            $user_id       = $_SESSION['user_id'];
            $product_id    = $_POST['product-id'];
            $product_price = $_POST['product-price'];
            $qty           = $_POST['qty'];
            $date          = date('Y-m-d');
            
            $general       = get_general_setting();
            $shipping_fee  = $general['shipping_fee']; 

            $total = ($product_price * $qty) + $shipping_fee;

            // check if exist cart
            $sql_exist    = "SELECT * FROM cart WHERE user_id = $user_id";
            $result_exist = $con->query($sql_exist);
            $exist_cart   = mysqli_num_rows($result_exist);
            if($exist_cart > 0) {
               $row = mysqli_fetch_assoc($result_exist);
               $cart_id    = $row['id'];
               $cart_total = $row['total'];
               $recalculate_total = $cart_total + $product_price;

               // update total price in cart
               $sql_update_cart = "UPDATE `cart` SET `total`= ".$recalculate_total." WHERE id = $cart_id";
               $con->query($sql_update_cart);
            }
            else {
                // create cart model
                $sql_cart = "
                    INSERT INTO `cart`(`user_id`, `shipping_fee`, `total`, `created_at`) 
                    VALUES ('".$user_id."', ".$shipping_fee.", ".$total.", '".$date."')
                ";
                $con->query($sql_cart);
                $cart_id = $con->insert_id;
            }

            // exist product in cart item
            $sql_exist_product = "SELECT * FROM cart_item WHERE product_id = $product_id";
            $result_exist_product = $con->query($sql_exist_product);
            $exist_product = mysqli_num_rows($result_exist_product);

            if($exist_product > 0) {
                $row = mysqli_fetch_assoc($result_exist_product);
                $cate_item_id = $row['id'];
                $exist_product_qty = $row['qty'] + $qty;
                $update_cart_item = "UPDATE `cart_item` SET `qty`= ".$exist_product_qty." WHERE id = $cate_item_id";
                $con->query($update_cart_item);
            }
            else {
                //  create cart items
                $sql_cart_item = "
                    INSERT INTO `cart_item`(`cart_id`, `product_id`, `qty`) 
                    VALUES (".$cart_id.", ".$product_id.", ".$qty.")
                ";
                $con->query($sql_cart_item);    
            }
        }
    }
    add_to_cart();


    // get cart by user
    function get_cart_by_user() {
        global $con;
        $user_id  = $_SESSION['user_id'];

        $sql_cart    = "SELECT * FROM cart WHERE  user_id = $user_id";
        $result_cart = $con->query($sql_cart);
        $exist_cart  = mysqli_num_rows($result_cart);
        
        if($exist_cart > 0) {
            $row_cart = mysqli_fetch_assoc($result_cart);
            $cart_id      = $row_cart['id'];
            $shipping_fee = $row_cart['shipping_fee'];
            $cart_total   = $row_cart['total'];
            
            // get cart item by cart id
            $sql_cart_item    = "SELECT * FROM cart_item WHERE cart_id = $cart_id";
            $result_cart_item = $con->query($sql_cart_item);
            while($row_cart_item = mysqli_fetch_assoc($result_cart_item)) {
                $product_id = $row_cart_item['product_id'];
                
                // get product by product id
                $sql_product    = "SELECT * FROM product WHERE id = $product_id";    
                $result_product = $con->query($sql_product); 
                while($row_product = mysqli_fetch_assoc($result_product)) {
                    $arr_product[] = $row_product;
                }
            }
            return array(
                'cart_id'      => $cart_id,
                'cart_total'   => $cart_total,
                'shipping_fee' => $shipping_fee,
                'product'      => $arr_product
            );
        }
        else {
            echo 'No products in cart';
        }
    }

    // Remove cart items
    function remove_cart_item() {
        global $con;
        if(isset($_POST['btn-remove-cart'])) {
            $user_id    = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];

            // get cart id
            $sql_cart    = "SELECT id, total FROM cart WHERE user_id = $user_id";
            $result_cart = $con->query($sql_cart);
            $row_cart    = mysqli_fetch_assoc($result_cart);
            $cart_id     = $row_cart['id'];

            // remove cart items
            $sql_item    = "DELETE FROM cart_item WHERE cart_id = $cart_id AND product_id = $product_id";
            $result_item = $con->query($sql_item);

            // recaculate cart total amount
            $cart_total_amount = $row_cart['total'];
            $sql_product    = "SELECT regular_price, sale_price FROM product WHERE id = $product_id";
            $result_product = $con->query($sql_product);
            $row_product    = mysqli_fetch_assoc($result_product);

            if($row_product['sale_price'] > 0) {
                $product_price = $row_product['sale_price'];
            }
            else {
                $product_price = $row_product['regular_price'];
            }
            
            $cart_amount = $cart_total_amount - $product_price;
            $sql_update_cart = "UPDATE `cart` SET `total`= $cart_amount WHERE id = $cart_id";
            $con->query($sql_update_cart);

            if($result_item) {
                echo 'Product removed from cart!';
            }

        }
    }
    remove_cart_item();

    // save address
    function save_address() {
        global $con;
        if(isset($_POST['btn-save-address'])) {
            $name    = $_POST['name'];
            $phone   = $_POST['phone'];
            $address = $_POST['address'];
            $user_id = $_SESSION['user_id'];
            $date    = date('Y-m-d');

            $sql     = "SELECT * FROM shipping_address WHERE user_id = $user_id";
            $result  = $con->query($sql);
            $exist   = mysqli_num_rows($result);
            if($exist > 0) {
                $sql_update_address = "
                    UPDATE `shipping_address` SET `name`='".$name."',`phone`='".$phone."',`location`='".$address."',`updated_at`='".$date."' WHERE user_id = $user_id
                ";
                $con->query($sql_update_address);
            }
            else {
                $sql_address = "
                    INSERT INTO `shipping_address`(`user_id`, `name`, `phone`, `location`, `created_at`, `updated_at`) 
                    VALUES (".$user_id.",'".$name."','".$phone."','".$address."','".$date."','".$date."')
                ";
                $con->query($sql_address);
            }

        }
    }
    save_address();

    // get user address
    function user_address() {
        global $con;
        $user_id = $_SESSION['user_id'];
        $sql     = "SELECT * FROM shipping_address WHERE user_id = $user_id";
        $result  = $con->query($sql);
        $row     = mysqli_fetch_assoc($result);
        return $row;
    }

    // user checkout
    function user_checkout() {
        global $con;
        if(isset($_POST['btn-placeorder'])) {
            //  cart info
            $cart    = get_cart_by_user();
            $shipping_fee = $cart['shipping_fee'];
            $cart_total   = $cart['cart_total'];

            $order_status = 'processing';
            $user_id      = $_SESSION['user_id'];
            $invoice      = 'inv-'.rand(1111,9999);
            $date         = date('Y-m-d');

            $sql_order = "
                INSERT INTO `order_product`(`invoice_id`, `user_id`, `shipping_fee`, `order_status`, `total`, `created_at`, `updated_at`) 
                VALUES ('".$invoice."',".$user_id.",".$shipping_fee.",'".$order_status."',".$cart_total.",'".$date."','".$date."')
            ";  
            $con->query($sql_order);
            $order_id = $con->insert_id;

            if($order_id) {
                $cart_id  = $cart['cart_id'];
                $sql_item = "SELECT * FROM cart_item WHERE cart_id = $cart_id";
                $rs_item  = $con->query($sql_item);
                while($row = mysqli_fetch_assoc($rs_item)) {
                    $product_id  = $row['product_id'];
                    $product_qty = $row['qty'];

                    $sql_order_item = "
                        INSERT INTO `order_item`(`order_id`, `product_id`, `qty`) 
                        VALUES (".$order_id.", ".$product_id.",".$product_qty.")
                    ";
                    $rs_order_item = $con->query($sql_order_item);
                    if($rs_order_item) {    
                        header('Location: success.php');
                    }
                }

                // remove cart & cart items
                $sql_remove_cart = "DELETE FROM cart WHERE id = $cart_id";
                $con->query($sql_remove_cart);
                $sql_remove_cart_item = "DELETE FROM cart_item WHERE cart_id = $cart_id";
                $con->query($sql_remove_cart_item);
            }
        }
    }
    user_checkout();

    // get order history
    function order_history() {
        global $con;
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `order_product` WHERE user_id = $user_id ORDER BY id DESC";
        $rs  = $con->query($sql);
        return $rs;
    }

    // get product by order id
    function get_produc_by_order_id($order_id) {
        global $con;
        $sql = "SELECT * FROM `order_item` WHERE order_id = $order_id";
        $rs  = $con->query($sql);
        while($row = mysqli_fetch_assoc($rs)) {
            $product_id  = $row['product_id'];
            $sql_product = "SELECT * FROM product WHERE id = $product_id";
            $rs_product  = $con->query($sql_product);
            $row_product = mysqli_fetch_assoc($rs_product);
             
        }
    }

?>