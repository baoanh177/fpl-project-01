<h2>Thêm mới khuyến mại</h2>
<form action="index.php?act=add_promotion" method="post">
    <div class="form-group">
        <label for="">Tên khuyến mại</label>
        <input type="text" class="form-control" placeholder="Tên khuyến mại" name="name" required>
    </div>
    <div class="form-group">
        <label for="">Mã khuyến mại</label>
        <input type="text" class="form-control" placeholder="Mã khuyến mại" name="code" required>
    </div>
    <div class="form-group">
        <label for="">Chiết khấu</label>
        <input type="number" class="form-control" placeholder="Chiết khấu" name="discount" min="0" max="100" required>
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu</label>
        <input type="date" class="form-control" placeholder="Ngày bắt đầu" name="start_date" required>
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc</label>
        <input type="date" class="form-control" placeholder="Ngày kết thúc" name="end_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=promotions" class="btn btn-secondary">Quay lại</a>
</form>