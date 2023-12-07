<h2>Danh sách sản phẩm</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=promotions" class="btn btn-secondary flex-shrink-1">Quay lại</a>
    <div>
        <div class="input-group">
            <input type="text" class="form-control rounded js-search-product" placeholder="Search" 
            aria-label="Search" aria-describedby="search-addon"/>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Đánh giá</th>
            <th>Đã bán</th>
            <th>Tồn kho</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $product_promotion = query_many("promotions", "promotion_id = $promotion_id");
            foreach($products as $product) {
                extract($product);
                $sql = "SELECT SUM(quantity) as quantity, SUM(sold) as total from variants where product_id = $id";
                $result = pdo_query($sql);
        ?>
            <tr class="js-product-row">
                <td><?=$id?></td>
                <td class="col-2 js-product-name"><?=$name?></td>
                <td>
                    <img src="../../../uploads/<?=$image?>" alt="">
                </td>
                <td>5</td>
                <td><?=$result[0]['total'] > 0 ? $result[0]['total'] : 0?></td>
                <td><?=$result[0]['quantity'] ?? 0?></td>
                <td>
                    <?php 
                        $isApply = false;
                        foreach($product_promotion as $item) {
                            if($item['product_id'] == $id) { 
                                $isApply = true;
                                $prom_id = $item['id'];
                                break;
                            }
                        }
                    ?>
                    <?php if($isApply) { ?>
                        <a href="index.php?act=unapply_promotion&product_id=<?=$product['id']?>&promotion_id=<?=$promotion_id?>&id=<?=$prom_id?>" class="btn btn-primary">Áp dụng</a>
                    <?php } else { ?>
                            <a href="index.php?act=apply_promotion&product_id=<?=$product['id']?>&promotion_id=<?=$promotion_id?>" class="btn btn-secondary">Không áp dụng</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>

        <script src="../../../public/js/web/products.js"></script>
    </tbody>
</table>