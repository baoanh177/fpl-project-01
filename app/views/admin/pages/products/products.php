<h2>Danh sách sản phẩm</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_product" class="btn btn-success flex-shrink-1">Thêm sản phẩm</a>
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
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Đánh giá</th>
            <th>Đã bán</th>
            <th>Tồn kho</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($products as $product) {
                extract($product);
                $sql = "SELECT SUM(quantity) as quantity, SUM(sold) as total from variants where product_id = $id";
                $result = pdo_query($sql);
        ?>
            <tr class="js-product-row">
                <td><?=$id?></td>
                <td class="col-2 js-product-name"><?=$name?></td>
                <td><?=number_format($price)?>đ</td>
                <td>
                    <img src="../../../uploads/<?=$image?>" alt="">
                </td>
                <td>5</td>
                <td><?=$result[0]['total'] > 0 ? $result[0]['total'] : 0?></td>
                <td><?=$result[0]['quantity'] ?? 0?></td>
                <td>
                    <?php if($product['status'] == 1) { ?>
                            <a href="index.php?act=hide_product&product_id=<?=$product['id']?>" class="btn btn-primary">Hiện</a>
                        <?php }else { ?>  
                            <a href="index.php?act=show_product&product_id=<?=$product['id']?>" class="btn btn-secondary">Ẩn</a>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="index.php?act=edit_product&product_id=<?=$id?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_product&product_id=<?=$id?>" class="btn btn-danger">Xóa</a>
                    <a href="index.php?act=variants&product_id=<?=$id?>" class="btn btn-info">Loại</a>
                </td>
            </tr>
        <?php } ?>

        <script src="../../../public/js/web/products.js"></script>
    </tbody>
</table>