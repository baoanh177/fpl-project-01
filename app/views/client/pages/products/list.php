<!-- Shop Product Start -->
<div class="col-lg-9 col-md-12">
    <div class="row pb-3">
        <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control js-search-product" placeholder="Tìm kiếm theo tên">
                    </div>
                </form>
            </div>
        </div>
        
        <?php 
            // $variants = query_many("variants", "status = 1 group by product_id, color_id LIMIT 12");
            foreach($variants as $variant) {
                extract($variant);
                $product = query_one("products", $product_id);
                $images = query_many("product_images", "product_id = $product_id and color_id = $color_id");
        ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 js-product-row">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="../../../uploads/<?=$images[0]['image']?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3 js-product-name"><?=$product['name']?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?=number_format($product['price'])?>đ</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a href="index.php?act=detail_product&product_id=<?=$product_id?>&color_id=<?=$color_id?>" 
                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <script src="../../../public/js/web/products.js"></script>
    </div>
</div>
<!-- Shop Product End -->