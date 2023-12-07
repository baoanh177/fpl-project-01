<?php
    function query_all($table, $order = "asc") {
        $sql = "SELECT * FROM $table order by id $order";
        return pdo_query($sql);
    }

    function query_many($table, $query_condition = 1) {
        $sql = "SELECT * from $table where $query_condition";
        return pdo_query($sql);
    }

    function query_one($table, $id) {
        $sql = "SELECT * from $table where id = $id";
        return pdo_query_one($sql);
    }

    function delete_row($table, $id) {
        $sql = "DELETE from $table where id = $id";
        pdo_execute($sql);
    }

    function show_row($table, $id) {
        $sql = "UPDATE $table set status=1 where id = $id";
        pdo_execute($sql);
    }
    
    function hide_row($table, $id) {
        $sql = "UPDATE $table set status=0 where id = $id";
        pdo_execute($sql);
    }
?>