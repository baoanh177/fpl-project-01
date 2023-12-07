<h2>Thêm mới biến thể sản phẩm</h2>
<form action="index.php?act=add_variant&product_id=<?=$product_id?>" method="post">
    <input type="hidden" name="id" value="<?=$product_id?>">
    <div class="mb-3">
        <label for="">Size</label>
        <select class="form-select" aria-label="Default select example" name="size_id" required>
            <option selected hidden>-- Chọn size --</option>
            <?php 
                $sizes = query_all("sizes");
                foreach ($sizes as $size) {
            ?>
                <option value="<?=$size['id']?>"><?=$size['name']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Màu</label>
        <select class="form-select" aria-label="Default select example" name="color_id" required>
            <option selected hidden>-- Chọn màu --</option>
            <?php 
                $colors = query_all("colors");
                foreach ($colors as $color) {
            ?>
                <option value="<?=$color['id']?>"><?=$color['name']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Số lượng</label>
        <input type="text" class="form-control" placeholder="Số lượng" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=variants&product_id=<?=$product_id?>" class="btn btn-secondary">Quay lại</a>
</form>