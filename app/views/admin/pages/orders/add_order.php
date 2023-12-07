<h2>Thêm mới đơn hàng</h2>
<form action="index.php?act=add_order" method="post">
    <?php showMessage() ?>
    <div class="mb-3">
        <label for="">ID người dùng</label>
        <select class="form-select" aria-label="Default select example" name="user_id" required>
            <option selected hidden>-- Chọn người dùng --</option>
            <?php 
                $users = query_all("users");
                foreach ($users as $user) {
            ?>
                <option value="<?=$user['id']?>"><?=$user['id']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tên người nhận</label>
        <input type="text" class="form-control" placeholder="Tên người nhận" name="name">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ người nhận</label>
        <input type="text" class="form-control" placeholder="Địa chỉ người nhận" name="address">
    </div>
    <div class="form-group">
        <label for="">SĐT người nhận</label>
        <input type="number" class="form-control" placeholder="Số điện thoại" name="tel">
    </div>
    <div class="form-group">
        <label for="">Ngày mua</label>
        <input type="date" class="form-control" placeholder="Ngày mua" name="date">
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=orders" class="btn btn-secondary">Quay lại</a>
</form>