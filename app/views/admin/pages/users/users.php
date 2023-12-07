<h2>Danh sách người dùng</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_user" class="btn btn-success flex-shrink-1">Thêm người dùng</a>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded js-search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Role</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) { 
            extract($user);
            $user_role = query_one("roles", $role);
        ?>
            <tr class="js-row">
                <td><?=$id?></td>
                <td class="col-2 js-name"><?=$display_name?></td>
                <td><?=$email?></td>
                <td><?=$username?></td>
                <td><?=$password?></td>
                <td><?=$user_role['name']?></td>
                <td class="text-center">
                    <a href="index.php?act=edit_user&user_id=<?=$id?>" class="btn btn-primary">Xem chi tiết</a>
                    <a href="index.php?act=delete_user&user_id=<?=$id?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        <script src="../../../public/js/web/all.js"></script>
    </tbody>
</table>