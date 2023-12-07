<h2>Danh sách khuyến mại</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_promotion" class="btn btn-success flex-shrink-1">Thêm khuyến mại</a>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded js-search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Tên khuyến mại</th>
            <th>Mã khuyến mại</th>
            <th>Chiết khấu</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($promotions as $promotion) {
            extract($promotion);
        ?>
            <tr class="js-row">
                <td><?= $id ?></td>
                <td class="js-name"><?= $name ?></td>
                <td><?= $promotion_code ?></td>
                <td><?= $discount_percent ?>%</td>
                <td><?= $start_date ?></td>
                <td><?= $end_date ?></td>
                <td>
                    <?php if(date("Y-m-d") > $end_date) { ?>
                        <button class="btn btn-secondary">Đã hết hạn</button>
                    <?php }else { ?>
                        <button class="btn btn-primary">Đang ...</button>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="index.php?act=product_promotion&promotion_id=<?= $id ?>" class="btn btn-info">Sản phẩm</a>
                    <a href="index.php?act=edit_promotion&promotion_id=<?= $id ?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_promotion&promotion_id=<?= $id ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        <script src="../../../public/js/web/all.js"></script>
    </tbody>
</table>