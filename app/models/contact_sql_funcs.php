<?php 
    function insert_contact($user_id, $title, $content, $tel, $email, $address) {
        $sql = "INSERT INTO contacts(user_id, title, content, tel, email, address)
        VALUES($user_id, '$title', '$content', $tel, '$email', '$address')";
        pdo_execute($sql);
    }
?>