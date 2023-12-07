<form class="container-sm" action="index.php?act=register" method="post">
  <h2 class="text-center">Đăng kí thành viên</h2>
  <?php showMessage() ?>
  <div class="form-outline mb-4">
      <label class="form-label" >Tên đầy đủ</label>
      <input type="text" name="display_name" class="form-control border border-primary" required/>
  </div>

  <div class="form-outline mb-4">
      <label class="form-label" >Tên đăng nhập</label>
      <input type="text" name="username" class="form-control border border-primary" required/>
  </div>

  <div class="form-outline mb-4">
      <label class="form-label">Địa chỉ Email</label>
      <input type="email" name="email" class="form-control border border-primary" required/>
  </div>

  <div class="form-outline mb-4">
      <label class="form-label">Mật khẩu</label>
    <input type="password" name="password" class="form-control border border-primary" required/>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Đăng ký</button>

  <div class="text-center">
    <p>Đã có tài khoản? <a href="index.php?act=login">Đăng nhập</a></p>
  </div>
</form>