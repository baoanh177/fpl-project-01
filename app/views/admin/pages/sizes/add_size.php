<h2>Thêm mới size</h2>
<form action="index.php?act=add_size" method="post">
    <?php showMessage() ?>
    <div class="form-group">
        <label for="">Tên size</label>
        <input type="text" class="form-control" placeholder="Tên size" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=sizes" class="btn btn-secondary">Quay lại</a>
</form>