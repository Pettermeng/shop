<?php include 'component/header.php'; ?>

<main>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <figure>
                        <img src="assets/image/login-thumbnail-01.png" alt="" class="rounded-1 w-100">
                    </figure>
                </div>
                <div class="col-6">
                    <nav>
                        <ul class="d-flex justify-content-center gap-3">
                            <li class="active px-3 py-2 rounded-3 btn-login">Login</li>
                            <li class="px-3 py-2 rounded-3 btn-register">Register</li>
                        </ul>
                    </nav>

                    <div class="message-box mt-4">
                        <div class="alert-msg success d-none">
                            Account Create Successfully!
                        </div>
                        <div class="alert-msg error">
                            Account Create Failed!
                        </div>
                    </div>
                    
                    <!-- Form Login -->
                    <form action="" method="post" class="login-form">
                        <label for="" class="mb-1">Phone | Email</label>
                        <input type="text" class="box rounded-1 p-2 mb-3">
                        <label for="" class="mb-1">Password</label>
                        <input type="password" class="box rounded-1 p-2 mb-3">
                        <button type="submit" class="p-2 mt-1 rounded-1">Login</button>
                    </form>

                    <!-- Form Register -->
                    <form action="" method="post" class="register-form">
                        <label for="" class="mb-1">Username</label>
                        <input type="text" class="box rounded-1 p-2 mb-3">
                        <label for="" class="mb-1">Phone Number</label>
                        <input type="tel" class="box rounded-1 p-2 mb-3">
                        <label for="" class="mb-1">Email</label>
                        <input type="email" class="box rounded-1 p-2 mb-3">
                        <label for="" class="mb-1">Password</label>
                        <input type="password" class="box rounded-1 p-2 mb-3">
                        <button type="submit" class="p-2 mt-1 rounded-1">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'component/footer.php'; ?>