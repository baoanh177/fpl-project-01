<h2>Chi tiết người dùng</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <?php showMessage() ?>
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="form-group">
        <label for="">Tên người dùng</label>
        <input type="text" class="form-control" placeholder="Tên người dùng" name="display_name" value="<?=$display_name?>">
    </div>
    <div class="form-group">
        <label for="">Tên đăng nhập</label>
        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" value="<?=$username?>">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="text" class="form-control" placeholder="Mật khẩu" name="password" value="<?=$password?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" value="<?=$email?>">
    </div>
    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" class="form-control" placeholder="Số điện thoại" name="tel" value="<?=$tel?>">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="<?=$address?>">
    </div>
    <div class="form-group">
        <label for="">Role</label>
        <select name="role">
            <?php 
                $roles = query_all("roles");
                foreach($roles as $row) {
            ?>
                <option value="<?=$row['id']?>" <?=$row['id'] == $role ? 'selected' : ''?>><?=$row['name']?></option>
            <?php } ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=users" class="btn btn-secondary">Quay lại</a>
</form>