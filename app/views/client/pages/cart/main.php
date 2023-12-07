<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php 
                        //Delete cart
                        if (isset($_GET['key'])) {
                            $key = $_GET['key'];
                            unset($_SESSION['cart'][$key]);
                            header("Location: index.php?act=cart");
                        }
                        if(isset($_SESSION['cart'])) {
                            if(count($_SESSION['cart']) > 0) {
                                foreach($_SESSION['cart'] as $key => $res) {
                                    $variant = query_one("variants", $res['variant_id']);
                                    $product = query_one("products", $variant['product_id']);
                                    $images = query_many("product_images", "product_id=".$variant['product_id']." and color_id=".$variant['color_id']);
                                    $size = query_one("sizes", $variant['size_id']);
                    ?>
                        <tr class="js-cart-row">
                            <td>
                                <img src="../../../uploads/<?=$images[0]['image']?>" alt="" style="width: 50px;">
                            </td>
                            <td class="align-middle" style="width: 300px; overflow: hidden;">
                                <a href="index.php?act=detail_product&product_id=<?=$product['id']?>&color_id=<?=$variant['color_id']?>&size_id=<?=$variant['size_id']?>"><?=$product['name']?></a>
                            </td>
                            <td><?=$size['name']?></td>
                            <td class="align-middle js-row-price"><?=number_format($product['price'])?>đ</td>
                            <td class="align-middle"><?=$res['quantity']?></td>
                            <td class="align-middle js-total-pr js-row-total">
                                <?=number_format($product['price'] * $res['quantity'])?>đ
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-sm btn-primary" href="index.php?act=cart&key=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php }}} ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Chi tiết</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng tiền hàng</h6>
                        <h6 class="font-weight-medium js-total-price"></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium"><?=count($_SESSION['cart'])>0?"30,000":0?>đ</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng thanh toán</h5>
                        <h5 class="font-weight-bold js-total-bill">0đ</h5>
                    </div>
                    <a href="index.php?act=checkout" class="btn btn-block btn-primary my-3 py-3">Thanh toán</a>
                </div>
            </div>
            <script>
                document.querySelectorAll('.js-quantity-input').forEach(input => {
                    input.onchange = (e) => {
                        const cartRow = e.target.closest('.js-cart-row')
                        const price = cartRow.querySelector(".js-row-price")
                        const total = cartRow.querySelector(".js-row-total")
                        total.innerText = (+price.innerText.replace("đ", '').replaceAll(",", '') * e.target.value).toLocaleString() + 'đ'
                        handleCal()
                    }
                })

                function handleCal() {
                    console.log('handle')
                    let totalPrice = 0
                    document.querySelectorAll(".js-total-pr").forEach(element => {
                        totalPrice += +element.innerText.replace("đ", '').replaceAll(',', '')
                    })
                    console.log(totalPrice)
                    document.querySelector(".js-total-price").innerText = totalPrice.toLocaleString() + 'đ'
                    document.querySelector(".js-total-bill").innerText = (totalPrice + <?=count($_SESSION['cart'])>0?30000:0?>).toLocaleString() + 'đ'
                }
                handleCal()
            </script>
        </div>
    </div>
</div>
<!-- Cart End -->