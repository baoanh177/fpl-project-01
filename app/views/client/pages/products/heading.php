<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">
                <?php 
                    if(isset($category_id)) {
                        $category = query_one("categories", $category_id);
                        echo $category['name'];
                    }else {
                        echo "Products";
                    }
                ?>
            </p>
        </div>
    </div>
</div>
<!-- Page Header End -->