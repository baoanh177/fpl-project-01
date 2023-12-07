<div class="d-flex align-items-center">
    <p class="font-weight-medium">Màu:</p>
    <form class="js-style">
        <?php 
            $variants = query_many("variants", "product_id=$product_id and status=1 group by color_id");
            foreach($variants as $variant) {
                $color = query_one("colors", $color_id);
        ?>
            <div class="d-inline-flex p-2">
                <a href="index.php?act=detail_product&product_id=<?=$product_id?>&color_id=<?=$variant['color_id']?>" 
                class="badge badge-<?=$color_id == $variant['color_id'] ? 'primary' : 'secondary'?>"
                ><?php
                    $color = query_one("colors", $variant['color_id']);
                    echo $color['name'];
                ?></a>
            </div>     
        <?php } ?>
    </form>
</div>