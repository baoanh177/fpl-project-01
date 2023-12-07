<h2>Chỉnh sửa danh mục</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <?php showMessage() ?>
    <input type="text" name="id" value="<?=$id?>" hidden>
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?act=categories" class="btn btn-secondary">Quay lại</a>
</form>