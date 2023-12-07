<div class="col-lg-5 pb-5">
    <div id="product-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner border">
            <?php
            $product_images = query_many("product_images", "status=1 and product_id="
                . $product_id . " and color_id=" . $color_id);
            foreach ($product_images as $image) {
            ?>
                <div class="carousel-item">
                    <img class="w-100 h-100" src="../../../uploads/<?= $image['image'] ?>" alt="Image">
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
            <i class="fa fa-2x fa-angle-left text-dark"></i>
        </a>
        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
            <i class="fa fa-2x fa-angle-right text-dark"></i>
        </a>
    </div>
    <script>
        document.querySelector("#product-carousel").children[0].children[0].classList.add('active')
    </script>
</div>