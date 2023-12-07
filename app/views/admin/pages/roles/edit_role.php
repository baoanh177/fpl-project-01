<h2>Chỉnh sửa thông tin</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <?php showMessage() ?>
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" placeholder="Tên khuyến mại" name="name"  value="<?=$name?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=roles" class="btn btn-secondary">Quay lại</a>
</form>