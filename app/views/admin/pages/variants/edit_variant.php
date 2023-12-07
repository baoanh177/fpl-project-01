<h2>Chỉnh sửa thông tin biến thể</h2>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="id" value="<?=$product_id?>">
    <div class="mb-3">
        <label for="">Size</label>
        <select class="form-select" aria-label="Default select example" name="size_id" required>
            <?php 
                $sizes = query_all("sizes");
                foreach ($sizes as $size) {
            ?>
                <option value="<?=$size['id']?>" <?=$size['id'] == $size_id ? 'selected' : ''?>><?=$size['name']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Màu</label>
        <select class="form-select" aria-label="Default select example" name="color_id" required>
            <?php 
                $colors = query_all("colors");
                foreach ($colors as $color) {
            ?>
                <option value="<?=$color['id']?>" <?=$color['id'] == $color_id ? 'selected' : ''?>><?=$color['name']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Số lượng</label>
        <input type="text" class="form-control" placeholder="Số lượng" name="quantity" value="<?=$quantity?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=variants&product_id=<?=$product_id?>" class="btn btn-secondary">Quay lại</a>
</form>