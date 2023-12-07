

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form class="row px-xl-5" action="index.php?act=pay" method="post">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Thông tin người nhận</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Tên người nhận</label>
                        <input class="form-control" type="text" name="name" placeholder="Tên người nhận" required value="<?=$display_name?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" name="tel" placeholder="+123 456 789" required value="<?=$tel?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ" required value="<?=$address?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                    <?php 
                        $totalPrice = 0;
                        foreach($_SESSION['cart'] as $value) {
                            $variant = query_one("variants", $value['variant_id']);
                            $product = query_one("products", $variant['product_id']);
                            $totalPrice += $product['price'] * $value['quantity'];
                    ?>
                        <div class="d-flex justify-content-between">
                            <p class="w-50"><?=$product['name']?></p>
                            <p>x<?=$value['quantity']?></p>
                            <p><?=number_format($product['price'])?>đ</p>
                        </div>
                    <?php
                        }
                    ?>
                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng phụ</h6>
                        <h6 class="font-weight-medium"><?=number_format($totalPrice)?>đ</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">30,000đ</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold"><?=number_format($totalPrice + 30000)?>đ</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal" checked>
                            <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button name="pay-btn" <?=count($_SESSION['cart']) > 0 ? '': 'disabled'?> class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->