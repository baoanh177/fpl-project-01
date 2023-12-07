<h2>Chỉnh sửa thông tin sản phẩm</h2>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php showMessage() ?>
    <div class="mb-3">
        <label for="">Biến thể</label>
        <select class="form-select" aria-label="Default select example" name="variant_id" required>
            <?php 
                $variants = query_all("variants");
                foreach ($variants as $variant) {
            ?>
                <option value="<?=$variant['id']?>" <?=$variant_id == $variant['id'] ? 'selected' : ''?>><?=$variant['id']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Chiết khấu</label>
        <input type="text" class="form-control" placeholder="Chiết khấu" name="discount" value="<?=$discount?>">
    </div>
    <div class="form-group">
        <label for="">Số lượng</label>
        <input type="text" class="form-control" placeholder="Số lượng" name="quantity" value="<?=$quantity?>">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=order_products&order_id=<?=$order_id?>" class="btn btn-secondary">Quay lại</a>
</form>