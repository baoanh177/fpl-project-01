<h2>Thêm mới ảnh sản phẩm</h2>
<form action="index.php?act=add_image&product_id=<?=$product_id?>&color_id=<?=$color_id?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$variant_id?>">
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="index.php?act=images&product_id=<?=$product_id?>&variant_id=<?=$variant_id?>" class="btn btn-secondary">Quay lại</a>
</form>