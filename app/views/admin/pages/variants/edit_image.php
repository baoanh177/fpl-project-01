<h2>Chỉnh sửa ảnh sản phẩm</h2>
<form action="index.php?act=edit_image&product_id=<?=$product_id?>&image_id=<?=$image_id?>&color_id=<?=$color_id?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$variant_id?>">
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" placeholder="Ảnh" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <a href="index.php?act=images&product_id=<?=$product_id?>&color_id=<?=$color_id?>" class="btn btn-secondary">Quay lại</a>
</form>