<?php

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

?>