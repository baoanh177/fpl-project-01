<h2>Chỉnh sửa sản phẩm</h2>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <?php showMessage() ?>
    <input type="text" name="id" value="<?=$id?>" hidden>
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" placeholder="Giá" name="price" value="<?=$price?>" required>
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Tên danh mục" name="image">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="desc" rows="3"><?=$description?></textarea>
    </div>
    <div class="mb-3">
        <label for="">Danh mục</label>
        <select class="form-select" aria-label="Default select example" name="category_id">
            <?php 
                $categories = query_all("categories");
                foreach ($categories as $category) {
            ?>
                <option value="<?=$category['id']?>" <?=$category['id'] == $category_id ? 'selected' : ''?>><?=$category['name']?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?act=products" class="btn btn-secondary">Quay lại</a>
</form>