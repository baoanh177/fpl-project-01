<h2>Thêm mới sản phẩm</h2>
<form action="index.php?act=add_product" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" name="name" required>
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" placeholder="Giá" name="price" required>
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Tên danh mục" name="image" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="desc" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="">Danh mục</label>
        <select class="form-select" aria-label="Default select example" name="category_id" required>
            <option selected hidden>-- Chọn danh mục --</option>
            <?php 
                $categories = query_all("categories");
                foreach ($categories as $category) {
            ?>
                <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=products" class="btn btn-secondary">Quay lại</a>
</form>