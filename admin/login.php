<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/theme.css">
        <?php include "component/external-css-import.php" ?>
        <?php include "function.php" ?>
    </head>
    <body>
        <section class="login-register">
            <div class="content">
                <form action="" method="post">
                    <div class="block">
                        <label>Username | Phone</label>
                        <input type="text" name="username" class="box">
                    </div class="block">
                    <div class="block">
                        <label>Password</label>
                        <input type="password" name="password" class="box">
                    </div>
                    <input type="submit" name="btn-login" value="Login" class="button">
                </form>
            </div>
        </section>
    </body>
    <?php include "component/external-js-import.php" ?>
</html>