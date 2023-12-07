<?php 
    function insert_promotion($name, $code, $discount, $start_date, $end_date) {
        $sql = "INSERT INTO detail_promotion(name, promotion_code, discount_percent, start_date, end_date)
        VALUES('$name', '$code', $discount, '$start_date', '$end_date')";
        pdo_execute($sql);
    }
    
    function update_promotion($id, $name, $code, $discount, $start_date, $end_date) {
        $sql = "UPDATE detail_promotion set name='$name', promotion_code='$code', 
        discount_percent=$discount, start_date='$start_date', end_date='$end_date' where id = $id";
        pdo_execute($sql);
    }

    function apply_promotion($product_id, $promotion_id) {
        $sql = "INSERT INTO promotions(product_id, promotion_id) VALUES($product_id, $promotion_id)";
        pdo_execute($sql);
    }


?>