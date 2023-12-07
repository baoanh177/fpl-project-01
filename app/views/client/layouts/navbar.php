<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block position-relative p-0">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="position-absolute bg-light w-100 collapse 
                <?php if (!isset($_GET['act'])) { ?> show <?php } ?>
                 navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical" style="z-index: 999;">
                <div class="navbar-nav w-100 overflow-hidden">
                    <?php
                    $categories = query_many("categories", "status=1");
                    foreach ($categories as $category) {
                        extract($category)
                    ?>
                        <a href="index.php?act=products&category_id=<?= $id ?>" class="nav-item nav-link"><?= $name ?></a>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <img src="../../../public/img/logo.png" alt="">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link
                            <?php if (!isset($_GET['act'])) {
                                echo "active";
                            } ?>
                        ">Trang chủ</a>
                        <a href="index.php?act=products" class="nav-item nav-link
                            <?php if (isset($_GET['act'])) {
                                if ($_GET['act'] == "products") {
                                    echo "active";
                                }
                            } ?>
                        ">Sản phẩm</a>
                        <a href="index.php?act=contact" class="nav-item nav-link
                            <?php if (isset($_GET['act'])) {
                                if ($_GET['act'] == "contact") {
                                    echo "active";
                                }
                            } ?>
                        ">Liên hệ</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $user = query_one("users", $user_id);
                        ?>
                            <label class="popup">
                                <input type="checkbox">
                                <div class="burger" tabindex="0">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <nav class="popup-window">
                                    <legend>Actions</legend>
                                    <ul>
                                        <li>
                                            <button>
                                                <span><a href="index.php?act=profile"><?=$user['display_name']?></a></span>
                                            </button>
                                        </li>
                                        <li>
                                            <button>
                                                <span><a href="index.php?act=order_history">Lịch sử mua hàng</a></span>
                                            </button>
                                        </li>
                                        <?php if($user['role'] == 1) { ?>
                                            <li>
                                                <button>
                                                    <span><a href="../admin">Trang quản trị</a></span>
                                                </button>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <button>
                                                <span><a href="index.php?act=logout">Đăng xuất</a></span>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </label>
                        <?php
                        } else {
                        ?>
                            <a href="index.php?act=login" class="nav-item nav-link">Đăng nhập</a>
                            <a href="index.php?act=register" class="nav-item nav-link">Đăng ký</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
            <?php if (!isset($_GET["act"])) { ?>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $banners = query_many("banners", "status=1");
                        foreach ($banners as $banner) {
                            extract($banner);
                        ?>
                            <div class="carousel-item " style="height: 410px;">
                                <img class="img-fluid" src="../../../uploads/<?= $image ?>" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3"><?= $subtitle ?></h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4"><?= $title ?></h3>
                                        <a href="<?= $link ?>" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <script>
                        document.querySelector(".carousel-item:first-child").classList.add('active')
                    </script>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Navbar End -->