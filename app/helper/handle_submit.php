<?php 
    function showMessage() {
        if(isset($_GET['status'])) {
            if($_GET['status'] == 'error') {
                if($_SESSION['error']) {
                    echo "<div class='text-danger'>".$_SESSION['error']."</div>";
                }
            }else if($_GET['status'] == 'success') {
                if($_SESSION['success']) {
                    echo "<div class='text-success'>".$_SESSION['success']."</div>";
                }
            }
        }
    }

?>