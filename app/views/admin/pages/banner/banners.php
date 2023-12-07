<h2>Danh sách banner</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="index.php?act=add_banner" class="btn btn-success flex-shrink-1">Thêm banner</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Phụ đề</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($banners as $banner) {
                extract($banner);
        ?>
            <tr>
                <td><?=$id?></td>
                <td>
                    <img src="../../../uploads/<?=$image?>" alt="" class="w-100">
                </td>
                <td><?=$title?></td>
                <td><?=$subtitle?></td>
                <td>
                    <?php if($banner['status'] == 1) { ?>
                            <a href="index.php?act=hide_banner&banner_id=<?=$id?>" class="btn btn-primary">Hide</a>
                        <?php }else { ?>  
                            <a href="index.php?act=show_banner&banner_id=<?=$id?>" class="btn btn-secondary">Show</a>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="index.php?act=edit_banner&banner_id=<?=$id?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_banner&banner_id=<?=$id?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>