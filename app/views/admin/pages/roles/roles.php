<h2>Danh sách role</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_role" class="btn btn-success flex-shrink-1">Thêm role</a>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Name</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($roles as $role) {
            extract($role);
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>

                <td class="text-center">
                    <?php 
                        if($id !== 1) {
                    ?>
                        <a href="index.php?act=edit_role&role_id=<?=$id?>" class="btn btn-warning">Sửa</a>
                        <a href="index.php?act=delete_role&role_id=<?=$id?>" class="btn btn-danger">Xóa</a>
                    <?php
                        }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>