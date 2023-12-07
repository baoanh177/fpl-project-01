<h2>Thêm mới người dùng</h2>
<form action="index.php?act=add_user" method="post">
    <div class="form-group">
        <label for="">Tên người dùng</label>
        <input type="text" class="form-control" placeholder="Tên người dùng" name="display_name">
    </div>
    <div class="form-group">
        <label for="">Tên đăng nhập</label>
        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="text" class="form-control" placeholder="Mật khẩu" name="password">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
    <div class="form-group">
        <label for="">Role</label>
        <select name="role" class="form-select">
            <?php 
                $roles = query_all("roles");
                foreach($roles as $role) {
            ?>
                <option value="<?=$role['id']?>" <?=$role['name'] == 'client' ? 'selected' : '' ?>><?=$role['name']?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=users" class="btn btn-secondary">Quay lại</a>
</form>