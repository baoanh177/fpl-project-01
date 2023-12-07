<div class="d-flex align-items-center">
    <p class="font-weight-medium ">Size:</p>
    <form class="js-style">
        <?php
            if(isset($_GET['size_id'])) {
                $size_id = $_GET['size_id'];
            }
            $variants = query_many("variants", "product_id=$product_id and color_id=$color_id and status=1");
            foreach($variants as $variant) {
                $size = query_one("sizes", $variant['size_id']);
        ?>
            <div class="d-inline-flex p-2">
                <a href="index.php?act=detail_product&product_id=<?=$product_id?>&color_id=<?=$color_id?>&size_id=<?=$variant['size_id']?>"
                class="badge badge-<?php
                    if(isset($size_id)) {
                        echo $size_id == $variant['size_id'] ? 'primary' : 'secondary';
                    }else {
                        echo "secondary";
                    }
                ?>"
                ><?php
                    $size = query_one("sizes", $variant['size_id']);
                    echo $size['name'];
                ?></a>
            </div>
        <?php } ?>
    </form>
</div>