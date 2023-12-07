<div class="d-flex align-items-center mb-4 pt-2">
<?php
    if(isset($size_id)) {
        $variant = query_many("variants", "product_id=$product_id and color_id=$color_id and size_id=$size_id");
    }
?>
<form action="index.php?act=add_to_cart" method="post">
    <input type="hidden" name="variant_id" value="<?=isset($size_id)?$variant[0]['id']:''?>">
    <div class="mb-3">
        <label class="">Số lượng:</label>
        <input type="number" class="bg-secondary w-50" name="quantity" min="1" max="<?=isset($size_id)?$variant[0]['quantity']:0?>" value="1">
    </div>
    <button class="btn btn-primary px-3"
        <?php 
            if(isset($size_id)) {
                if($variant[0]['quantity'] < 0) {
                    echo "disabled";
                }
            }else {
                echo 'title="Vui lòng chọn size" disabled';
            }
        ?>
    >
        <i class="fa fa-shopping-cart mr-1"></i>
        
        <?php 
            if(isset($size_id)) {
                if($variant[0]['quantity'] < 0) {
                    echo "Hết hàng";
                }else {
                    echo "Add To Cart";
                }
            }else {
                echo 'Add To Cart';
            }
        ?>
    </button>
</form>
</div>