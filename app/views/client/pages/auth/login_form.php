<form class="container-sm" action="index.php?act=login" method="post">
  <h2 class="text-center">Đăng nhập</h2>
  <?php showMessage() ?>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Tên đăng nhập</label>
    <input type="text" id="form2Example1" name="username" class="form-control border border-primary" required/>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Mật khẩu</label>
    <input type="password" id="form2Example2" name="password" class="form-control border border-primary" required/>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Đăng nhập</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Chưa có tài khoản? <a href="index.php?act=register">Đăng ký</a></p>
  </div>
</form>