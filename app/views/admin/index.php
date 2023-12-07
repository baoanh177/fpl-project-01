<?php
ob_start();
session_start();

include "../../models/pdo_library.php";
include "../../helper/handle_submit.php";

include "../../models/sql_funcs.php";
if (!isset($_SESSION['user_id'])) {
  header("Location: ../client/");
  die();
} else {
  $user_id = $_SESSION['user_id'];
  $user = query_one("users", $user_id);
  if ($user['role'] != 1) {
    header("Location: ../client/");
    die();
  }
}
include "../../models/cate_sql_funcs.php";
include "../../models/user_sql_funcs.php";
include "../../models/product_sql_funcs.php";
include "../../models/image_sql_funcs.php";
include "../../models/order_sql_funcs.php";
include "../../models/role_sql_funcs.php";
include "../../models/promotion_sql_funcs.php";
include "./layouts/header.php";
include "./layouts/sidebar.php";


?>

<div class="content-wrapper py-4">
  <div class="inner container">
    <?php
    if (isset($_GET["act"])) {
      $action = $_GET["act"];
      switch ($action) {
          // Categories
        case "categories":
          $categories = query_all("categories", "desc");
          include "./pages/categories/categories.php";
          break;
        case "add_category":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["name"];
            $image = $_FILES["image"];

            $path = $image["name"];

            move_uploaded_file($image["tmp_name"], "../../../uploads/" . $path);

            insert_category($name, $path);
            $_SESSION['success'] = "<div class='success'>Thêm danh mục thành công</div>";
            header('Location: index.php?act=add_category&status=success');
          }
          include "./pages/categories/add_category.php";
          break;
        case "edit_category":
          if (isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            $category = query_one("categories", $id);
            extract($category);
            $prevImage = $image;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name = $_POST['name'];
              $image = $_FILES['image'];

              if (empty($image['name'])) {
                $path = $prevImage;
              } else {
                $prevPath = "../../../uploads/$prevImage";
                if (file_exists($prevPath)) {
                  unlink($prevPath);
                }
                $path = $image['name'];
              }

              move_uploaded_file($image['tmp_name'], "../../../uploads/" . $path);

              update_cate($id, $name, $path);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_category&category_id=$id&status=success");
            }
          }
          include "./pages/categories/edit_category.php";
          break;
        case "delete_category":
          if (isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            delete_row("categories", $id);
            $category = query_one("categories", $id);
            $path = "../../../uploads/" . $category['image'];
            echo $path;
            if (file_exists($path)) {
              unlink($path);
            }
            header("Location: index.php?act=categories");
          }
          break;
        case "show_category":
          if (isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            show_row("categories", $id);
            header("Location: index.php?act=categories");
          }
          $categories = query_all("categories", "desc");
          include "./pages/categories/categories.php";
          break;
        case "hide_category":
          if (isset($_GET["category_id"])) {
            $id = $_GET["category_id"];
            hide_row("categories", $id);
            header("Location: index.php?act=categories");
          }
          $categories = query_all("categories", "desc");
          include "./pages/categories/categories.php";
          break;

          // Product
        case "products":
          $products = query_all("products", "desc");
          include "./pages/products/products.php";
          break;
        case "add_product":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $desc = $_POST["desc"];
            $category_id = $_POST["category_id"];
            $image = $_FILES["image"];

            $path = $image["name"];

            move_uploaded_file($image["tmp_name"], "../../../uploads/" . $path);

            insert_product($name, $price, $desc, $path, $category_id);
            $_SESSION['success'] = "<div class='success'>Thêm sản phẩm thành công</div>";
            header('Location: index.php?act=add_product&status=success');
          }
          include "./pages/products/add_product.php";
          break;
        case "edit_product":
          if (isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            $product = query_one("products", $id);
            extract($product);

            $prevImage = $image;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name = $_POST['name'];
              $price = $_POST['price'];
              $desc = $_POST['desc'];
              $category_id = $_POST['category_id'];
              $image = $_FILES['image'];

              if (empty($image['name'])) {
                $path = $prevImage;
              } else {
                $prevPath = "../../../uploads/$prevImage";
                if (file_exists($prevPath)) {
                  unlink($prevPath);
                }
                $path = $image['name'];
              }

              move_uploaded_file($image['tmp_name'], "../../../uploads/" . $path);

              update_product($id, $name, $price, $desc, $path, $category_id);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_product&product_id=$id&status=success");
            }
          }
          include "./pages/products/edit_product.php";
          break;
        case "show_product":
          if (isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            show_row("products", $id);
            header("Location: index.php?act=products");
          }
          $products = query_all("products", "desc");
          include "./pages/products/products.php";
          break;
        case "hide_product":
          if (isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            hide_row("products", $id);
            header("Location: index.php?act=products");
          }
          $products = query_all("products", "desc");
          include "./pages/products/products.php";
          break;
        case "delete_product":
          if (isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            delete_row("products", $id);
            header("Location: index.php?act=products");
          }
          // Variants
        case "variants":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            $variants = query_many("variants", "product_id = $product_id");
          }
          include "./pages/variants/variants.php";
          break;
        case "add_variant":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $size_id = $_POST['size_id'];
              $color_id = $_POST['color_id'];
              $quantity = $_POST['quantity'];
              $product_id = $_POST['id'];

              insert_variant($product_id, $size_id, $color_id, $quantity);
            }
          }

          include './pages/variants/add_variant.php';
          break;
        case "show_variant":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            if (isset($_GET["variant_id"])) {
              $id = $_GET["variant_id"];
              show_row("variants", $id);
              header("Location: index.php?act=variants&product_id=" . $product_id);
            }
          }
          $variants = query_all("variants", "desc");
          include "./pages/variants/variants.php";
          break;
        case "hide_variant":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            if (isset($_GET["variant_id"])) {
              $id = $_GET["variant_id"];
              hide_row("variants", $id);
              header("Location: index.php?act=variants&product_id=" . $product_id);
            }
          }
          $variants = query_all("variants", "desc");
          include "./pages/variants/variants.php";
          break;
        case "delete_variant":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            if (isset($_GET["variant_id"])) {
              $id = $_GET["variant_id"];
              delete_row("variants", $id);
              header("Location: index.php?act=variants&product_id=" . $product_id);
            }
          }
          break;
        case "edit_variant":
          if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            if (isset($_GET["variant_id"])) {
              $variant_id = $_GET["variant_id"];
              $variant = query_one("variants", $variant_id);
              extract($variant);
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $size_id = $_POST['size_id'];
                $color_id = $_POST['color_id'];
                $quantity = $_POST['quantity'];

                update_variant($variant_id, $size_id, $color_id, $quantity);
                header("Location: index.php?act=variants&product_id=" . $product_id);
              }
            }
          }
          include "./pages/variants/edit_variant.php";
          break;
          // Image
        case "images":
          if (isset($_GET["product_id"]) && isset($_GET['color_id'])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET["color_id"];
            $images = query_many("product_images", "product_id=$product_id and color_id=$color_id");
          }
          include "./pages/variants/images.php";
          break;
        case "add_image":
          if (isset($_GET["product_id"]) && isset($_GET["color_id"])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET["color_id"];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $image = $_FILES['image'];
              $path = $image["name"];

              move_uploaded_file($image["tmp_name"], "../../../uploads/" . $path);

              insert_image($product_id, $color_id, $path);
              header("Location: index.php?act=images&product_id=" . $product_id . "&color_id=" . $color_id);
            }
          }
          include "./pages/variants/add_image.php";
          break;
        case "delete_image":
          if (isset($_GET["product_id"]) && isset($_GET['color_id']) && isset($_GET["image_id"])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET['color_id'];
            $image = query_one("product_images", $_GET["image_id"]);
            $path = "../../../uploads/" . $image['image'];
            if (file_exists($path)) {
              unlink($path);
            }
            delete_row("product_images", $_GET["image_id"]);
            header("Location: index.php?act=images&product_id=" . $product_id . "&color_id=" . $color_id);
          }
          break;
        case "edit_image":
          if (isset($_GET["product_id"]) && isset($_GET['color_id']) && isset($_GET['image_id'])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET["color_id"];
            $image_id = $_GET["image_id"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              if ($_FILES['image']['name'] != '') {
                $path = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../../../uploads/" . $path);
                update_image($image_id, $path);
              }
              header("Location: index.php?act=images&product_id=$product_id&color_id=$color_id");
            }
          }
          include "./pages/variants/edit_image.php";
          break;
        case "show_image":
          if (isset($_GET["product_id"]) && isset($_GET['color_id']) && isset($_GET['image_id'])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET["color_id"];
            $image_id = $_GET["image_id"];
            show_row("product_images", $image_id);
            header("Location: index.php?act=images&product_id=$product_id&color_id=$color_id");
          }
          include "./pages/variants/images.php";
          break;
        case "hide_image":
          if (isset($_GET["product_id"]) && isset($_GET['color_id']) && isset($_GET['image_id'])) {
            $product_id = $_GET["product_id"];
            $color_id = $_GET["color_id"];
            $image_id = $_GET["image_id"];
            hide_row("product_images", $image_id);
            header("Location: index.php?act=images&product_id=$product_id&color_id=$color_id");
          }
          include "./pages/variants/images.php";
          break;
          // User
        case "users":
          $users = query_all("users", "desc");
          include "./pages/users/users.php";
          break;
        case "add_user":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $display_name = $_POST['display_name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            insert_user($display_name, $username, $password, $email, $role);
            $_SESSION['success'] = 'Thêm mới user thành công';
            header('Location: index.php?act=add_user');
          }
          include "./pages/users/add_user.php";
          break;
        case "delete_user":
          if (isset($_GET["user_id"])) {
            $id = $_GET["user_id"];
            delete_row("users", $id);
            header("Location: index.php?act=users");
          }
          break;
        case "edit_user":
          if (isset($_GET["user_id"])) {
            $id = $_GET["user_id"];
            $user = query_one("users", $id);
            extract($user);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $id = $_POST['id'];
              $tel = $_POST['tel'];
              $address = $_POST['address'];
              $display_name = $_POST['display_name'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $email = $_POST['email'];
              $role = $_POST['role'];

              update_user($id, $username, $password, $email, $tel, $address, $display_name, $role);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_user&user_id=$id&status=success");
            }
          }
          include "./pages/users/detail_user.php";
          break;
          // Comment
        case "comments":
          $comments = query_all("comments", "desc");
          include "./pages/comments/comments.php";
          break;
        case "delete_comment":
          if (isset($_GET['comment_id'])) {
            $id = $_GET['comment_id'];
            delete_row("comments", $id);
            header('Location: index.php?act=comments');
          }
          break;
          // Banner
        case 'banners':
          $banners = query_all("banners");
          include "./pages/banner/banners.php";
          break;
        case "add_banner":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = $_FILES['image'];
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $link = $_POST['link'];

            $path = $image['name'];
            move_uploaded_file($image['tmp_name'], "../../../uploads/" . $path);

            insert_banner($path, $title, $subtitle, $link);
            header("Location: index.php?act=banners");
          }
          include "./pages/banner/add_banner.php";
          break;
        case "delete_banner":
          if (isset($_GET["banner_id"])) {
            $id = $_GET["banner_id"];
            $banner = query_one("banners", $id);
            $path = "../../../uploads/" . $banner["image"];
            if (file_exists($path)) {
              unlink($path);
            }
            delete_row("banners", $id);
            header("Location: index.php?act=banners");
          }
          break;
        case "edit_banner":
          if (isset($_GET["banner_id"])) {
            $id = $_GET["banner_id"];
            $banner = query_one("banners", $id);
            extract($banner);
            $prevImage = $image;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $image = $_FILES['image'];
              $title = $_POST['title'];
              $subtitle = $_POST['subtitle'];
              $link = $_POST['link'];

              if (empty($path)) {
                $path = $prevImage;
              }

              move_uploaded_file($image['tmp_name'], '../../../uploads/' . $path);

              update_banner($id, $path, $title, $subtitle, $link);
              header('Location: index.php?act=banners');
            }
          }
          include "./pages/banner/edit_banner.php";
          break;
        case "show_banner":
          if (isset($_GET["banner_id"])) {
            $id = $_GET["banner_id"];
            show_row("banners", $id);
            header("Location: index.php?act=banners");
          }
          $banners = query_all("banners", "desc");
          include "./pages/banners/banners.php";
          break;
        case "hide_banner":
          if (isset($_GET["banner_id"])) {
            $id = $_GET["banner_id"];
            hide_row("banners", $id);
            header("Location: index.php?act=banners");
          }
          $banners = query_all("banners", "desc");
          include "./pages/banners/banners.php";
          break;
          // Order
        case "orders":
          $orders = query_all("orders", "desc");
          include "./pages/orders/orders.php";
          break;
        case "add_order":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $date = $_POST['date'];

            insert_order($user_id, $name, $address, $tel, $date);
            $_SESSION['success'] = "Thêm đơn hàng thành công";
            header("Location: index.php?act=add_order&status=success");
          }
          include "./pages/orders/add_order.php";
          break;
        case "edit_order":
          if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $order = query_one("orders", $order_id);
            extract($order);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $user_id = $_POST['user_id'];
              $name = $_POST['name'];
              $address = $_POST['address'];
              $tel = $_POST['tel'];
              $date = $_POST['date'];

              update_order($order_id, $user_id, $name, $address, $tel, $date);
              $_SESSION['success'] = "Lưu thông tin thành công";
              header("Location: index.php?act=edit_order&order_id=$order_id&status=success");
            }
          }
          include "./pages/orders/edit_order.php";
          break;
        case "order_products":
          if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $order_detail = query_many("detail_order", "order_id=$order_id");
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $status = $_POST['status'];
              update_order_status($order_id, $status);
              header("Location: index.php?act=orders");
            }
          }
          include "./pages/orders/order_products.php";
          break;
        case "delete_order":
          if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            delete_row("orders", $order_id);
            $sql = "DELETE from detail_order where order_id=$order_id";
            pdo_execute($sql);
            header("Location: index.php?act=orders");
          }
          break;
        case "add_order_product":
          if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $variant_id = $_POST['variant_id'];
              $discount = $_POST['discount'];
              $quantity = $_POST['quantity'];

              $variant = query_one("variants", $variant_id);
              $product = query_one("products", $variant['product_id']);

              $price = $product['price'];
              $total_price = ($price * $quantity) - (($price * $quantity) / 100 * $discount);

              insert_detail_order($order_id, $variant_id, $price, $quantity, $discount, $total_price);
              $_SESSION['success'] = "Thêm thành công";
              header("Location: index.php?act=add_order_product&order_id=$order_id&status=success");
            }
          }
          include "./pages/orders/add_order_product.php";
          break;
        case "edit_order_product":
          if (isset($_GET['detail_id']) && isset($_GET['detail_id'])) {
            $order_id = $_GET['order_id'];
            $detail_id = $_GET['detail_id'];
            $order_detail = query_one("detail_order", $detail_id);
            extract($order_detail);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $variant_id = $_POST['variant_id'];
              $discount = $_POST['discount'];
              $quantity = $_POST['quantity'];

              $variant = query_one("variants", $variant_id);
              $product = query_one("products", $variant['product_id']);

              $price = $product['price'];
              $total_price = ($price * $quantity) - (($price * $quantity) / 100 * $discount);

              update_detail_order($detail_id, $order_id, $variant_id, $price, $quantity, $discount, $total_price);
              $_SESSION['success'] = "Lưu thông tin thành công";
              header("Location: index.php?act=edit_order_products&order_id=$order_id&detail_id=$detail_id&status=success");
            }
          }
          include "./pages/orders/edit_order_product.php";
          break;
        case "delete_order_product":
          if (isset($_GET['detail_id']) && isset($_GET['detail_id'])) {
            $order_id = $_GET['order_id'];
            $detail_id = $_GET['detail_id'];
            delete_row("detail_order", $detail_id);
            header("Location: index.php?act=order_product&order_id=$order_id");
          }
          break;

          // Promotion
        case "promotions":
          $promotions = query_all("detail_promotion");
          include "./pages/promotions/promotions.php";
          break;
        case "add_promotion":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $code = $_POST['code'];
            $discount = $_POST['discount'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            insert_promotion($name, $code, $discount, $start_date, $end_date);
            header("Location: index.php?act=promotions");
          }
          include "./pages/promotions/add_promotion.php";
          break;
        case "product_promotion":
          if (isset($_GET['promotion_id'])) {
            $promotion_id = $_GET['promotion_id'];
            $products = query_all("products");
          }
          include "./pages/promotions/products_promotion.php";
          break;
        case "edit_promotion":
          if (isset($_GET['promotion_id'])) {
            $promotion_id = $_GET['promotion_id'];
            $promotion = query_one("detail_promotion", $promotion_id);
            extract($promotion);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $id = $_POST['id'];
              $name = $_POST['name'];
              $code = $_POST['code'];
              $discount = $_POST['discount'];
              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];

              update_promotion($id, $name, $code, $discount, $start_date, $end_date);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_promotion&promotion_id=$promotion_id&status=success");
            }
          }
          include "./pages/promotions/edit_promotion.php";
          break;
        case "delete_promotion":
          if (isset($_GET['promotion_id'])) {
            $promotion_id = $_GET['promotion_id'];
            delete_row("detail_promotion", $promotion_id);
            header("Location: index.php?act=promotions");
          }
          break;
        case "apply_promotion":
          if (isset($_GET['product_id']) && isset($_GET['promotion_id'])) {
            $product_id = $_GET['product_id'];
            $promotion_id = $_GET['promotion_id'];

            apply_promotion($product_id, $promotion_id);
            header("Location: index.php?act=product_promotion&promotion_id=" . $promotion_id);
          }
          break;
        case "unapply_promotion":
          if (isset($_GET['promotion_id']) && isset($_GET['id'])) {
            $id = $_GET['id'];
            $promotion_id = $_GET['promotion_id'];
            delete_row("promotions", $id);
            header("Location: index.php?act=product_promotion&promotion_id=" . $promotion_id);
          }
          break;
          // Contact
        case "contacts":
          $contacts = query_all("contacts", "desc");
          include "./pages/contacts/contacts.php";
          break;
        case "delete_contact":
          if (isset($_GET["contact_id"])) {
            $id = $_GET["contact_id"];
            delete_row("contacts", $id);
            header("Location: index.php?act=contacts");
          }
          break;
        case "show_contact":
          if (isset($_GET['contact_id'])) {
            show_row("contacts", $_GET['contact_id']);
            header("Location: index.php?act=contacts");
          }
          break;
        case "hide_contact":
          if (isset($_GET['contact_id'])) {
            hide_row("contacts", $_GET['contact_id']);
            header("Location: index.php?act=contacts");
          }
          break;
          // Color
        case "colors":
          $colors = query_all("colors");
          include "./pages/colors/colors.php";
          break;
        case "add_color":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            insert_color($name);
            $_SESSION['success'] = "Thêm thành công";
            header("Location: index.php?act=add_color&status=success");
          }
          include "./pages/colors/add_color.php";
          break;
        case "delete_color":
          if (isset($_GET['color_id'])) {
            $color_id = $_GET['color_id'];
            delete_row("colors", $color_id);
            header("Location: index.php?act=colors");
          }
          break;
          // Size
        case "sizes":
          $sizes = query_all("sizes");
          include "./pages/sizes/sizes.php";
          break;
        case "add_size":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            insert_size($name);
            $_SESSION['success'] = "Thêm thành công";
            header("Location: index.php?act=add_size&status=success");
          }
          include "./pages/sizes/add_size.php";
          break;
        case "delete_size":
          if (isset($_GET['size_id'])) {
            $size_id = $_GET['size_id'];
            delete_row("sizes", $size_id);
            header("Location: index.php?act=sizes");
          }
          break;
          //roles
        case "roles":
          $roles = query_all("roles");
          include "./pages/roles/roles.php";
          break;
        case "add_role":
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];

            insert_role($name);
            header("Location: index.php?act=roles");
          }
          include "./pages/roles/add_role.php";
          break;
        case "edit_role":
          if (isset($_GET['role_id'])) {
            $role_id = $_GET['role_id'];
            if ($role_id == 1) {
              header("Location: index.php?act=roles");
            }
            $role = query_one("roles", $role_id);
            extract($role);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $id = $_POST['id'];
              $name = $_POST['name'];

              update_role($id, $name);
              $_SESSION['success'] = "<div class='success'>Lưu thông tin thành công</div>";
              header("Location: index.php?act=edit_role&role_id=$role_id&status=success");
            }
          }
          include "./pages/roles/edit_role.php";
          break;
        case "delete_role":
          if (isset($_GET['role_id'])) {
            $role_id = $_GET['role_id'];
            delete_row("roles", $role_id);
            header("Location: index.php?act=roles");
          }
          break;
          // Chart
        case "charts":
          include "./pages/charts/charts.php";
          break;
      }
    } else {
      $orders = query_all("orders");
      $users = query_all("users");
      include "./layouts/home.php";
    }

    ?>
  </div>
</div>

<?php
include "./layouts/footer.php";
?>