<div class="container">
    <h2>Chi tiết đơn hàng: <?=$id?></h2>
    <div>
        <a href="index.php?act=order_history" class="btn btn-info flex-shrink-1 my-2">Quay lại</a>
    <?php 
        $order = query_one("orders", $order_id);
        $status = query_one("order_status", $order['status']);
        if($order['status'] == 1) { ?>
        <a href="index.php?act=cancel_order&order_id=<?=$order['id']?>" class="btn btn-danger">Hủy đơn</a>
    <?php }else { ?>
        <button class="btn btn-danger" disabled>Hủy đơn</button>
    <?php } ?>
    </div>
    <div class="heading d-flex justify-content-between align-items-center mb-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2" class="text-center text-center table-info">Thông tin đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Mã đơn hàng</th>
                    <td><?=$order_id?></td>
                </tr>
                <tr>
                    <th>ID người nhận</th>
                    <td><?=$user_id?></td>
                </tr>
                <tr>
                    <th>Số điên thoại</th>
                    <td><?=$order['tel']?></td>
                </tr>
                <tr>
                    <th>Địa chỉ nhận hàng</th>
                    <td><?=$order['address']?></td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>
                        <?php if($order['status'] == 4){ ?>
                            <a href="index.php?act=order_confirm&order_id=<?=$id?>" class="btn btn-success">Đã nhận được hàng</a>
                        <?php }else if($order['status'] == 5) { ?>
                            <button class="btn btn-success" disabled>Hoàn thành</button>
                        <?php }else { ?>
                            <button class="btn btn-outline-<?php
                                if($order['status'] == 1) {
                                    echo 'info';
                                }else if($order['status'] == 2) {
                                    echo 'warning';
                                }else if($order['status'] == 3) {
                                    echo 'primary';
                                }
                            ?>"><?=$status['name']?></button>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="heading d-flex justify-content-between align-items-center mb-4">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center table-info">
                    <th colspan="8">Danh sách sản phẩm</th>
                </tr>
                <tr class="text-center table-primary">
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Chiết khẩu</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_product = 0;
                $total_money = 0;
                foreach ($order_detail as $order) {
                    extract($order);
                    $variant = query_one("variants", $variant_id);
                    $product = query_one("products", $variant['product_id']);
                    $color = query_one("colors", $variant['color_id']);
                    $size = query_one("sizes", $variant['size_id']);
                    $total_product += $quantity;
                    $total_money += $total_price;
                ?>
                    <tr>
                        <td>
                            <img src="../../../uploads/<?= $product['image'] ?>" alt="" style="width: 60px">
                        </td>
                        <td>
                            <a href="index.php?act=detail_product&product_id=<?=$product['id']?>&color_id=<?=$variant['color_id']?>"><?=$product['name']?></a>
                        </td>
                        <td><?=$color['name']?></td>
                        <td><?=$size['name']?></td>
                        <td><?= number_format($product['price']) ?>đ</td>
                        <td class="text-center"><?= $quantity ?></td>
                        <td class="text-center"><?= $discount ?>%</td>
                        <td><?= number_format($total_price) ?>đ</td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <th colspan="5" rowspan="2" class="text-center">Tổng hóa đơn</th>
                    <th rowspan="1">Số lượng</th>
                    <td colspan="3" class="text-center"><?= $total_product ?></td>
                </tr>
                <tr class="table-success">
                    <th>Thành tiền</th>
                    <td colspan="3" class="text-center"><?= number_format($total_money) ?>đ</td>
                </tr>
            </tfoot>
        </table>
    </div>