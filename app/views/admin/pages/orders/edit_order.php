<h2>Chỉnh sửa thông tin đơn hàng</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <?php showMessage() ?>
    <div class="mb-3">
        <label for="">ID người dùng</label>
        <select class="form-select" aria-label="Default select example" name="user_id" required>
            <?php 
                $users = query_all("users");
                foreach ($users as $user) {
            ?>
                <option value="<?=$user['id']?>" <?=$user['id'] == $user_id ? 'selected' : ''?>><?=$user['id']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tên người nhận</label>
        <input type="text" class="form-control" placeholder="Tên người nhận" name="name" value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ người nhận</label>
        <input type="text" class="form-control" placeholder="Địa chỉ người nhận" name="address" value="<?=$address?>">
    </div>
    <div class="form-group">
        <label for="">SĐT người nhận</label>
        <input type="number" class="form-control" placeholder="Số điện thoại" name="tel" value="<?=$tel?>">
    </div>
    <div class="form-group">
        <label for="">Ngày mua</label>
        <input type="date" class="form-control" placeholder="Ngày mua" name="date" value="<?=$date?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=orders" class="btn btn-secondary">Quay lại</a>
</form>