<h2>Thêm mới danh mục</h2>
<form action="index.php?act=add_category" method="post" enctype="multipart/form-data">
    <?php showMessage() ?>
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" required name="name">
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" required name="image">
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=categories" class="btn btn-secondary">Quay lại</a>
</form>