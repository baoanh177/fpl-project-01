<!-- Shop Detail Start -->
<div class="container-fluid py-5 product-box">
    <div class="row px-xl-5">
        <?php include "./pages/detail_product/product/images.php"; ?>
        
        <div class="col-lg-7 pb-5">
            <?php
                include "./pages/detail_product/product/information.php";
                include "./pages/detail_product/product/colors.php";
                include "./pages/detail_product/product/sizes.php";
                include "./pages/detail_product/product/submit.php";
            ?>
        </div>
    </div>
    <?php
        include "./pages/detail_product/product/description.php";
        if(isset($_GET['status'])) {
            if($_GET['status'] == 'success') {
                include "./pages/detail_product/success_modal.php";
            }else if($_GET['status'] == 'error') {
                include "./pages/detail_product/error_modal.php";
            }
        }
    ?>
    
</div>
<!-- Shop Detail End -->