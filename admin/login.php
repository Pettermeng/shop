<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/theme.css">
        <?php include "component/external-css-import.php" ?>
    </head>
    <body>
        <section class="login-register">
            <div class="container">
                <form action="" method="post">
                    <span>Username - Email</span>
                    <input type="text" name="username">
                    <span>Password</span>
                    <input type="password" name="password">
                    <input type="submit" name="btn-login" value="Login">
                </form>
            </div>
        </section>
    </body>
    <?php include "component/external-js-import.php" ?>
</html>