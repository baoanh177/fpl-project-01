<!-- Shop Sidebar Start -->
<div class="col-lg-3 col-md-12">
    <!-- Price Start -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
        <form action="" method="get">
            <input type="submit" value="lọc">
            <input type="hidden" name="act" value="products">

            <?php
                if(isset($_GET["category_id"])){
                    $category_id = $_GET["category_id"];
            ?>
                <input type="hidden" name="category_id" value="<?= $category_id ?>">
            <?php } ?>

            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="radio" name="price" class="custom-control-input" checked id="price-all" value="-1">
                <label class="custom-control-label" for="price-all">All Price</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="radio" name="price" class="custom-control-input" id="price-1" value="1">
                <label class="custom-control-label" for="price-1">$0 - $100</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="radio" name="price" class="custom-control-input" id="price-2" value="2">
                <label class="custom-control-label" for="price-2">$100 - $200</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="radio" name="price" class="custom-control-input" id="price-3" value="3">
                <label class="custom-control-label" for="price-3">$200 - $300</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="radio" name="price" class="custom-control-input" id="price-4" value="4">
                <label class="custom-control-label" for="price-4">$300 - $400</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="radio" name="price" class="custom-control-input" id="price-5" value="5">
                <label class="custom-control-label" for="price-5">$400 - $500</label>
            </div>
            <!-- Color Start -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" name="color[]" class="custom-control-input" checked id="color-all" value="-1">
                <label class="custom-control-label" for="color-all">All Color</label>
            </div>
            <?php 
                $colors = query_all("colors");
                foreach($colors as $color) {
                    extract($color);
            ?>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="checkbox" name="color[]" class="custom-control-input" id ="color-<?= $id ?>" value="<?= $id ?>">
                    <label class="custom-control-label" for="color-<?= $id ?>"><?=$name?></label>
                </div>
            <?php
                }
            ?>
            <!-- Color End -->
            
            <!-- Size Start -->
            
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" name="size[]" class="custom-control-input" checked id="size-all" value="-1">
                <label class="custom-control-label" for="size-all">All Size</label>
            </div>


            <?php 
                $sizes = query_all("sizes");
                foreach($sizes as $size) {
                    extract($size);
            ?>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="checkbox" name="size[]" class="custom-control-input" id="size-<?= $id ?>" value="<?= $id ?>">
                    <label class="custom-control-label" for="size-<?= $id ?>"><?= $name ?></label>
                </div>
            <?php
                }
            ?>
            <!-- Size End -->
        </form>
    </div>
</div>
<!-- Shop Sidebar End -->