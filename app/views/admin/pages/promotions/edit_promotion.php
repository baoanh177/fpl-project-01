<h2>Chỉnh sửa thông tin khuyến mại</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <?php showMessage() ?>
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="form-group">
        <label for="">Tên khuyến mại</label>
        <input type="text" class="form-control" placeholder="Tên khuyến mại" name="name"  value="<?=$name?>" required>
    </div>
    <div class="form-group">
        <label for="">Mã khuyến mại</label>
        <input type="text" class="form-control" placeholder="Mã khuyến mại" name="code"  value="<?=$promotion_code?>" required>
    </div>
    <div class="form-group">
        <label for="">Chiết khấu</label>
        <input type="number" class="form-control" placeholder="Chiết khấu" name="discount"  value="<?=$discount_percent?>" min="0" max="100" required>
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu</label>
        <input type="date" class="form-control" placeholder="Ngày bắt đầu" name="start_date"  value="<?=$start_date?>" required>
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc</label>
        <input type="date" class="form-control" placeholder="Ngày kết thúc" name="end_date"  value="<?=$end_date?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=promotions" class="btn btn-secondary">Quay lại</a>
</form>