<h2>Chỉnh sửa thông tin banner</h2>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" name="image">
    </div>
    <div class="form-group">
        <label for="">Tiêu đề</label>
        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" value="<?=$title?>" required>
    </div>
    <div class="form-group">
        <label for="">Phụ đề</label>
        <input type="text" class="form-control" placeholder="Phụ đề" name="subtitle" value="<?=$subtitle?>" required>
    </div>
    <div class="form-group">
        <label for="">Liên kết</label>
        <input type="text" class="form-control" placeholder="Liên kết" name="link" value="<?=$link?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=banners" class="btn btn-secondary">Quay lại</a>
</form>