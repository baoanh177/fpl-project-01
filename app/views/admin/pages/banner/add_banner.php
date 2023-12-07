<h2>Thêm mới banner</h2>
<form action="index.php?act=add_banner" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" name="image" required>
    </div>
    <div class="form-group">
        <label for="">Tiêu đề</label>
        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" required>
    </div>
    <div class="form-group">
        <label for="">Phụ đề</label>
        <input type="text" class="form-control" placeholder="Phụ đề" name="subtitle" required>
    </div>
    <div class="form-group">
        <label for="">Liên kết</label>
        <input type="text" class="form-control" placeholder="Liên kết" name="link" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=banners" class="btn btn-secondary">Quay lại</a>
</form>