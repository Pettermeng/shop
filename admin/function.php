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
            
            $header_logo      = $_FILES['header_logo'];
            $header_logo_name = move_file($header_logo);

            $footer_logo      = $_FILES['footer_logo'];
            $footer_logo_name = move_file($footer_logo);
            $date = date('Y-m-d');
            
            $sql = "
                INSERT INTO `general`(`header_logo`, `footer_logo`, `shipping_fee`, `created_at`, `updated_at`) 
                VALUES ('". $header_logo_name ."', '". $footer_logo_name ."', '". $shipping_fee ."', '". $date ."', '". $date ."' )
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

?>