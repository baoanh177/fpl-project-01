    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php 
                foreach($categories as $category) {
                    extract($category);
                    $sql = "SELECT COUNT(*) as total from products where category_id = $id";
                    $count = pdo_query($sql);
            ?>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4 border-primary" style="padding: 30px;">
                        <p class="text-right"><?=$count[0]['total'];?> Products</p>
                        <a href="index.php?act=products&category_id=<?=$id?>" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="../../../uploads/<?=$image?>" alt="" style="height: 180px;width: 100%; object-fit: cover;">
                        </a>
                        <h5 class="font-weight-semi-bold m-0"><?=$name?></h5>
                    </div>
                </div>
            <?php } ?>
            
        </div>
    </div>
    <!-- Categories End -->