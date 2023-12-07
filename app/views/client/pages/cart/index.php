<?php 
    if(count($_SESSION['cart']) > 0) {
        include "./pages/cart/main.php";
    }else {
        echo "<h4 class='text-center'>Giỏ hàng trống</h4>";
    }
?>