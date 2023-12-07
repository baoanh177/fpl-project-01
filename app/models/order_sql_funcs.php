<?php 
    function insert_order($user_id, $name, $address, $tel, $date) {
        $sql = "INSERT INTO orders(user_id, name, address, tel, date)
        VALUES($user_id, '$name', '$address', $tel, '$date')";
        return pdo_execute($sql);
    }

    function update_order($id, $user_id, $name, $address, $tel, $date) {
        $sql = "UPDATE orders set user_id=$user_id, name='$name', address='$address', tel=$tel, date='$date' where id = $id";
        return pdo_execute($sql);
    }

    function update_order_status($id, $status) {
        $sql = "UPDATE orders set status=$status where id=$id";
        pdo_execute($sql);
    }

    function insert_detail_order($order_id, $variant_id, $price, $quantity, $discount = 0, $total_price) {
        $sql = "INSERT INTO detail_order(order_id, variant_id, price, quantity, discount, total_price)
        VALUES($order_id, $variant_id, $price, $quantity, $discount, $total_price)";
        pdo_execute($sql);
    }

    function update_detail_order($id, $order_id, $variant_id, $price, $quantity, $discount, $total_price) {
        $sql = "UPDATE detail_order set order_id=$order_id, variant_id=$variant_id, price=$price, 
        quantity=$quantity, discount=$discount, total_price=$total_price where id=$id";
        pdo_execute($sql);
    }
?>