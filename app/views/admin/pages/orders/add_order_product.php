<h2>Thêm sản phẩm vào đơn hàng</h2>
<form action="index.php?act=add_order_product&order_id=<?=$order_id?>" method="post">
    <?php showMessage() ?>
    <div class="mb-3">
        <label for="">Biến thể</label>
        <select class="form-select" aria-label="Default select example" name="variant_id" required>
            <option selected hidden>-- Chọn biến thể --</option>
            <?php 
                $variants = query_all("variants");
                foreach ($variants as $variant) {
            ?>
                <option value="<?=$variant['id']?>"><?=$variant['id']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Chiết khấu</label>
        <input type="text" class="form-control" placeholder="Chiết khấu" name="discount" value="0">
    </div>
    <div class="form-group">
        <label for="">Số lượng</label>
        <input type="text" class="form-control" placeholder="Số lượng" name="quantity">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=order_products&order_id=<?=$order_id?>" class="btn btn-secondary">Quay lại</a>
</form>