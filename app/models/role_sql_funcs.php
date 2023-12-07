<?php 
    function insert_role($name) {
        $sql = "INSERT INTO roles(name) VALUES('$name')";
        pdo_execute($sql);
    }

    function update_role($id, $name) {
        $sql = "UPDATE roles set name='$name' where id=$id";
        pdo_execute($sql);
    }

?>