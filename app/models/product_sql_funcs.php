<?php

function insert_product($name, $price, $desc, $path, $category_id) {
    $sql = "INSERT INTO products(name, price, description, image, category_id) VALUES('$name', $price, '$desc', '$path', $category_id)";
    pdo_execute($sql);
}

function update_product($id, $name, $price, $desc, $path, $category_id) {
    $sql = "UPDATE products set name='$name',price=$price, description='$desc', image='$path', category_id=$category_id where id = $id";
    pdo_execute($sql);
}

function insert_variant($product_id, $size_id, $color_id, $quantity) {
    $sql = "INSERT INTO variants(product_id, size_id, color_id, quantity)
    VALUES($product_id, $size_id, $color_id, $quantity)";
    pdo_execute($sql);
}

function update_variant($id, $size_id, $color_id, $quantity) {
    $sql = "UPDATE variants set size_id=$size_id, 
    color_id=$color_id, quantity=$quantity where id = $id";
    pdo_execute($sql);
}

function insert_color($name) {
    $sql = "INSERT INTO colors(name) VALUES('$name')";
    pdo_execute($sql);
}

function insert_size($name) {
    $sql = "INSERT INTO sizes(name) VALUES('$name')";
    pdo_execute($sql);
}


function build_filter_product($category_id=null,$price = null,$colors=null,$sizes=null){
    // echo "<pre>";
    // print_r([$category_id,$price,$colors,$sizes]);
    // echo "</pre>";
    $sql= "SELECT variants.* 
        FROM variants INNER JOIN products ON variants.product_id = products.id 
        WHERE variants.status = 1 ";

    if($category_id){
        $sql.="AND products.category_id = $category_id ";
    }

    $arrPrice = ["NONE","BETWEEN 0 AND 100000","BETWEEN 101000 AND 200000", "BETWEEN 201000 AND 300000","BETWEEN 301000 AND 500000","> 500000"];
    if($price > 0){
        $sql .= "AND products.price ".$arrPrice[$price]." ";
    }

    if(isset($colors) && count($colors) >0 && $colors[0]== -1){
        unset($colors[0]);
    }


    if(isset($colors) && count($colors) > 0) {
        $sqlColor="";
        $sql .="AND ( ";
        foreach($colors as $c){
            $sqlColor .= 'OR color_id = ' .$c.' ';
        }
        $sqlColor = substr($sqlColor, 2, mb_strlen($sqlColor));

        $sql .= "$sqlColor )";
    }
    if(isset($sizes) && count($sizes) > 0 && $sizes[0]== -1){
        unset($sizes[0]);
    }

    
    if(isset($sizes) && count($sizes) > 0) {
        $sql .="AND ( ";
        $sqlSize='';
        foreach($sizes as $s){
            $sqlSize .= 'OR size_id = '.$s.' ';
        }
        $sqlSize = substr($sqlSize, 2, mb_strlen($sqlSize));

        $sql .= "$sqlSize )";
    }

    $sql.="GROUP BY product_id, color_id LIMIT 12";
    // echo $sql;
    return pdo_query($sql);
}

?>