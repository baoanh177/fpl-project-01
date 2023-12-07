<?php

function insert_category($name, $path) {
    $sql = "INSERT INTO categories(name, image) VALUES('$name', '$path')";
    pdo_execute($sql);
}

function update_cate($id, $name, $path) {
    $sql = "UPDATE categories set name='$name', image='$path' where id = $id";
    pdo_execute($sql);
}

?>