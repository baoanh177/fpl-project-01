<h2>Danh sách danh mục</h2>
<div class="heading d-flex justify-content-between align-items-center mb-4">
    <a href="index.php?act=add_category" class="btn btn-success flex-shrink-1">Thêm danh mục</a>
    <div>
        <div class="input-group">
            <input type="search" class="form-control rounded js-search_category" placeholder="Search" 
            aria-label="Search" aria-describedby="search-addon" name="search_param"/>
        </div>
    </div>
</div>
<table class="w-100 table-bordered">
    <thead>
        <tr class="text-center table-primary">
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên danh mục</th>
            <th>Sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($categories as $category) {
                $sql = "SELECT COUNT(*) as total from products where category_id = ".$category['id'];
                $total = pdo_query($sql)[0]['total'];
        ?>
            <tr class="js-category-row">
                <td><?=$category['id']?></td>
                <td>
                    <img src="../../../uploads/<?=$category['image']?>" alt="">    
                </td>
                <td class="col-2 js-cate-name"><?=$category['name']?></td>
                <td><?=$total?></td>
                <td class="text-center">
                    <?php if($category['status'] == 1) { ?>
                        <a href="index.php?act=hide_category&category_id=<?=$category['id']?>" class="btn btn-primary">Hide</a>
                        <?php }else { ?>  
                            <a href="index.php?act=show_category&category_id=<?=$category['id']?>" class="btn btn-secondary">Show</a>
                    <?php } ?>
                    </a>
                    <a href="index.php?act=edit_category&category_id=<?=$category['id']?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_category&category_id=<?=$category['id']?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php
            }
        ?>
        <script src="../../../public/js/web/categories.js"></script>
    </tbody>
</table>