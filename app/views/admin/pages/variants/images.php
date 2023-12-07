<h2>Danh sách hình ảnh</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="index.php?act=add_image&product_id=<?=$product_id?>&color_id=<?=$color_id?>" class="btn btn-success flex-shrink-1">Thêm ảnh</a>
        <a href="index.php?act=variants&product_id=<?=$product_id?>" class="btn btn-secondary">Quay lại</a>
    </div>
    <div>
        <div class="input-group">
            <input type="text" class="form-control rounded js-search-product" placeholder="Search" 
            aria-label="Search" aria-describedby="search-addon"/>
        </div>
    </div>
</div>
<?php showMessage() ?>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($images as $image) {
        ?>
            <tr>
                <td><?=$image['id']?></td>
                <td>
                    <img src="../../../uploads/<?=$image['image']?>" alt="">
                </td>
                <td>
                    <?php if($image['status'] == 1) { ?>
                        <a href="index.php?act=hide_image&product_id=<?=$product_id?>&image_id=<?=$image['id']?>&color_id=<?=$color_id?>" class="btn btn-primary">Hide</a>
                    <?php }else { ?>  
                        <a href="index.php?act=show_image&product_id=<?=$product_id?>&image_id=<?=$image['id']?>&color_id=<?=$color_id?>" class="btn btn-secondary">Show</a>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="index.php?act=edit_image&product_id=<?=$product_id?>&image_id=<?=$image['id']?>&color_id=<?=$color_id?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_image&product_id=<?=$product_id?>&image_id=<?=$image['id']?>&color_id=<?=$color_id?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>