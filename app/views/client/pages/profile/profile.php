<section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../../../public/img/user.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <?php $role = query_one("roles", $role) ?>
                        <p class="text-muted mb-1"><?=$role['name']?></p>
                        <h5 class="my-3"><?=$display_name?></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                            <!-- Profile -->
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Họ tên</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$display_name?>" name="display_name" placeholder="Chưa có thông tin" required />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tài khoản</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$username?>" name="username" readonly placeholder="Chưa có thông tin" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mật khẩu</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$password?>" name="password" placeholder="Chưa có thông tin" required />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$email?>" name="email" placeholder="Chưa có thông tin" required />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số điện thoại</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$tel?>" name="tel" placeholder="Chưa có thông tin" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border border-light w-100" value="<?=$address?>" name="address" placeholder="Chưa có thông tin" />
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-end">
                                <?php showMessage() ?>
                                <button class="btn btn-primary">Lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>