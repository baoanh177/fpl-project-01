<h2>Danh sách màu sản phẩm</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_color" class="btn btn-success">Thêm mới màu</a>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Tên màu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($colors as $color) {
            extract($color);
        ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$name?></td>
                <td class="text-center">
                    <a href="index.php?act=delete_color&color_id=<?=$id?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>