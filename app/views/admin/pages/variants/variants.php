<h2>Danh sách biên thể</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="index.php?act=add_variant&product_id=<?= $product_id ?>" class="btn btn-success flex-shrink-1">Thêm biên thể</a>
        <a href="index.php?act=products" class="btn btn-secondary">Quay lại</a>
    </div>
    <div>
        <div class="input-group">
            <input type="text" class="form-control rounded js-search-product" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>
</div>
<?php showMessage() ?>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Tồn kho</th>
            <th>Đã bán</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($variants as $variant) {
            extract($variant);
            $color = query_one("colors", $color_id);
            $size = query_one("sizes", $size_id);
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $color['name'] ?></td>
                <td><?= $size['name'] ?></td>
                <td><?= $quantity ?></td>
                <td><?= $sold ?></td>
                <td>
                    <?php if ($variant['status'] == 1) { ?>
                        <a href="index.php?act=hide_variant&product_id=<?= $product_id ?>&variant_id=<?= $id ?>" class="text-bg-success badge">Hiện</a>
                    <?php } else { ?>
                        <a href="index.php?act=show_variant&product_id=<?= $product_id ?>&variant_id=<?= $id ?>" class="text-bg-secondary badge">Ẩn</a>
                    <?php } ?>
                </td>
                <td class="text-center">

                    <a href="index.php?act=edit_variant&product_id=<?= $product_id ?>&variant_id=<?= $id ?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_variant&product_id=<?= $product_id ?>&variant_id=<?= $id ?>" class="btn btn-danger">Xóa</a>
                    <a href="index.php?act=images&product_id=<?= $product_id ?>&color_id=<?=$color_id?>" class="btn btn-info">Ảnh</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>