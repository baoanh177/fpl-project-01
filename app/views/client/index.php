<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    include "../../models/pdo_library.php";
    include "../../helper/handle_submit.php";
    include "../../models/sql_funcs.php";
    include "../../models/user_sql_funcs.php";
    include "../../models/order_sql_funcs.php";
    include "../../models/contact_sql_funcs.php";
    include "../../models/product_sql_funcs.php";
    include "./layouts/header.php";
    if(isset($_GET["act"])) {
        $act = $_GET["act"];
        switch($act) {
            case "products":
                $category_id=null;
                $price=null;
                $colors=null;
                $sizes=null;
                if(isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                    // $products = query_many("products", "category_id = $category_id");

                }else {
                    // $products = query_all("products");
                }

                if(isset($_GET["price"])){
                    $price = $_GET["price"];
                }
                if(isset($_GET["color"])){
                    $colors = $_GET["color"];
                }
                if(isset($_GET["size"])){
                    $sizes = $_GET["size"];
                }
                
                $variants = build_filter_product($category_id,$price,$colors,$sizes);
                include "./pages/products/index.php";
                break;
            case "contact":
                include "./pages/contact/index.php";
                break;
            case "cart":
                include "./pages/cart/index.php";
                break;
            case "add_to_cart":
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $variant_id = $_POST['variant_id'];
                    $quantity = $_POST['quantity'];
                    $variant = query_one("variants", $variant_id);

                    if(!isset($_SESSION['user_id'])) {
                        header("Location: index.php?act=detail_product&product_id="
                        .$variant['product_id']."&color_id=".$variant['color_id']
                        ."&size_id=".$variant['size_id']."&status=error");
                        die;
                    }

                    $flag = true;
                    if(count($_SESSION['cart']) > 0) {
                        for($i=0; $i<count($_SESSION['cart']); $i++){
                            if($_SESSION['cart'][$i]['variant_id'] == $variant_id) {
                                $_SESSION['cart'][$i]['quantity'] += $quantity;
                                $flag = false;
                                break;
                            }
                        }
                    }
                    if($flag) {
                        $data = ["variant_id" => $variant_id, "quantity" => $quantity];
                        $_SESSION['cart'][] = $data;
                    }

                    header("Location: index.php?act=detail_product&product_id="
                    .$variant['product_id']."&color_id=".$variant['color_id']
                    ."&size_id=".$variant['size_id']."&status=success");
                }
                break;
            case "detail_product":
                if(isset($_GET['product_id']) && isset($_GET['color_id'])) {
                    $product_id = $_GET['product_id'];
                    $color_id = $_GET['color_id'];
                    $variant = query_many("variants", "product_id=$product_id and color_id=$color_id");
                    $product = query_one("products", $product_id);
                }
                include "./pages/detail_product/index.php";
                break;
            case "checkout":
                if(isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $user = query_one("users", $user_id);
                    extract($user);
                }
                include "./pages/checkout/checkout.php";
                break;
            case "pay":
                if(isset($_POST['pay-btn'])) {
                    $user_id = $_SESSION['user_id'];
                    $name = $_POST['name'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];
                    $date = date("Y-m-d H:i:s");
                    $order_id = insert_order($user_id, $name, $address, $tel, $date);

                    foreach($_SESSION['cart'] as $value) {
                        $variant = query_one("variants", $value['variant_id']);
                        $product = query_one("products", $variant['product_id']);
                        $total_price = $product['price'] * $value['quantity'];
                        insert_detail_order($order_id, $variant['id'], $product['price'], $value['quantity'], 0, $total_price);
                    }
                    $_SESSION['cart'] = [];
                    header("Location: index.php?act=order_history&status=success");
                }
                break;
            case "order_history":
                $user_id = $_SESSION['user_id'];
                $orders = query_many("orders", "user_id=$user_id");
                include "./pages/order_history/order_history.php";
                break;
            case 'detail_order':
                if(isset($_GET['order_id'])) {
                    $order_id = $_GET['order_id'];
                    $order_detail = query_many("detail_order", "order_id=$order_id");
                }
                include "./pages/order_history/detail_order.php";
                break;
            case "order_confirm":
                if(isset($_GET['order_id'])) {
                    $order_id = $_GET['order_id'];
                    $sql = "UPDATE orders set status=5 where id=$order_id";
                    pdo_execute($sql);
                    header("Location: index.php?act=order_history");
                }
                break;
            case "cancel_order":
                if(isset($_GET['order_id'])) {
                    $order_id = $_GET['order_id'];
                    delete_row("orders", $order_id);
                    $_SESSION['success'] = "Hủy đơn hàng thành công";
                    header("Location: index.php?act=order_history&status=success");
                }
                break;
            case "add_contact":
                if(isset($_SESSION['user_id'])) {
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $user_id = $_SESSION['user_id'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $title = $_POST['title'];
                        $content = $_POST['content'];

                        $user = query_one("users", $user_id);
                        insert_contact($user_id, $title, $content, $tel, $email, $user['address']);
                        $_SESSION['success'] = "Gửi liên hệ thành công";
                        header("Location: index.php?act=contact&status=success");
                        die;
                    }
                }
                include "./pages/contact/index.php";
                break;
            case "login":
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $user = check_user($username, $password);
                    if($user) {
                        $_SESSION['user_id'] = $user['id'];
                        header("Location: index.php");
                    }else {
                        $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng";
                        header('Location: index.php?act=login&status=error');
                    }
                }
                include "./pages/auth/login_form.php";
                break;
            case "register":
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $display_name = $_POST['display_name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $users = query_all("users");
                    foreach($users as $user) {
                        if($username == $user['username']) {
                            $_SESSION['error'] = "Tên tài khoản đã tồn tại";
                            header('Location: index.php?act=register&status=error');
                            die;
                        }else if($email == $user['email']) {
                            $_SESSION['error'] = "Email đã tồn tại";
                            header('Location: index.php?act=register&status=error');
                            die;
                        }
                    }
                    insert_user($display_name, $username, $password, $email);
                    $_SESSION['success'] = "Đăng kí thành công";
                    header('Location: index.php?act=register&status=success');
                }
                include "./pages/auth/register_form.php";
                break;
            case "logout":
                if(isset($_SESSION['user_id'])) {
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                }
                break;
            case "profile":
                if(isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $user = query_one("users", $user_id);
                    extract($user);
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $id = $_POST['id'];
                        $display_name = $_POST['display_name'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $address = $_POST['address'];
                        update_user($id, $username, $password, $email, $tel, $address, $display_name, $role);
                        $_SESSION['success'] = "Lưu thông tin thành công";
                        header("Location: index.php?act=profile&status=success");
                    }
                }
                include "./pages/profile/profile.php";
                break;
            default:
                include "./pages/home/index.php";
        }
    }else {
        $categories = query_many("categories", "status = 1 LIMIT 6");
        include "./pages/home/index.php";
    }
    include "./layouts/footer.php";
?>