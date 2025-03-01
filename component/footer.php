<footer>

<!-- search popup -->
<div class="search-popup">
    <div class="block d-flex flex-column justify-content-center align-items-center">
        <form action="get" method="post" class="d-flex flex-column gap-2 rounded-1">
            <div class="cancel d-flex justify-content-end">
                <img src="assets/image/cancel.svg" alt="" class="close">
            </div>
            <input type="text" class="box" placeholder="Search">
            <button type="submit">
                Search Here
            </button>
        </form>
    </div>
</div>

<div class="container py-4">
    <div class="top d-flex justify-content-center">
        <a href="">
            <?php 
                $footer = get_general_setting();
                echo '
                    <img src="../shop/admin/assets/upload/'. $footer['footer_logo'] .'" alt="" class="rounded-1 w-100">
                ';
            ?>
        </a>
    </div>
    <hr>
    <div class="bottom">
        <h5 class="text-center">Follow US</h5>
        <ul class="d-flex justify-content-center gap-2">
            <li>
                <a href="">
                    <img src="https://placehold.co/40" alt="">
                </a>
            </li>
            <li>
                <a href="">
                    <img src="https://placehold.co/40" alt="">
                </a>
            </li>
        </ul>
    </div>
</div>

</footer>

</body>
<!-- jquery -->
<script src="assets/jquery/jquery.js"></script>
<!-- theme script -->
<script src="assets/js/theme.js"></script>
<!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>