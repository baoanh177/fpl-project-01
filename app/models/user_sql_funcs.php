<?php

function insert_user($display_name, $username, $password, $email, $role = 2) {
    $sql = "INSERT INTO users(display_name, username, password, email, role) VALUES('$display_name', '$username', '$password', '$email', $role)";
    pdo_execute($sql);
}

function update_user($id, $username, $password, $email, $tel, $address, $display_name, $role) {
    $sql = "UPDATE users set username='$username', password='$password',
    email='$email', tel=$tel, address='$address', display_name='$display_name', role=$role where id = $id";
    pdo_execute($sql);
}

function check_user($username, $password) {
    $sql = "SELECT * FROM users where username='$username' AND password='$password'";
    return pdo_query_one($sql);
}

?>