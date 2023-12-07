<?php 
    function insert_image($product_id, $color_id, $image) {
        $sql = "INSERT INTO product_images(product_id, color_id, image) VALUES($product_id, $color_id, '$image')";
        pdo_execute($sql);
    }

    function update_image($id, $image) {
        $sql = "UPDATE product_images set image='$image' where id=$id";
        pdo_execute($sql);
    }

    function insert_banner($image, $title, $subtitle, $link) {
        $sql = "INSERT INTO banners(image, title, subtitle, link) VALUES('$image', '$title', '$subtitle', '$link')";
        pdo_execute($sql);
    }

    function update_banner($id, $image, $title, $subtitle, $link) {
        $sql = "UPDATE banners set image='$image', title='$title', subtitle='$subtitle', link='$link' where id = $id";
        pdo_execute($sql);
    }
?>