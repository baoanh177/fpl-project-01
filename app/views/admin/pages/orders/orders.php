<h2>Danh sách đơn hàng</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_order" class="btn btn-success flex-shrink-1">Thêm đơn hàng</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Người đặt</th>
            <th>Người nhận</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($orders as $order) {
                extract($order);
                $user = query_one("users", $user_id);
                $status = query_one("order_status", $status);
        ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$user['display_name']?></td>
                <td><?=$name?></td>
                <td><?=$address?></td>
                <td><?=$tel?></td>
                <td><?=$date?></td>
                <td><?=$status['name']?></td>
                <td class="text-center">
                    <a href="index.php?act=edit_order&order_id=<?=$id?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=order_products&order_id=<?=$id?>" class="btn btn-primary">Chi tiết</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>