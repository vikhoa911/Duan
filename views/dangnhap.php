<section class="Login1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <form action="index.php?act=dangnhap" method="post">
                    <h3 class="text-center mb-4">Đăng nhập</h3>
                    <?php if (isset($thongbao)) echo "<p class='text-danger'>$thongbao</p>"; ?>
                    <div class="form-outline mb-4">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control" placeholder="Nhập tên đăng nhập" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" id="mat_khau" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                    <button type="submit" name="dangnhap" class="btn btn-primary w-100">Đăng nhập</button>
                    <p class="mt-3">Bạn chưa có tài khoản? <a href="index.php?act=dangky">Đăng ký ngay</a></p>
                </form>
            </div>
            <div class="col-md-6">
                <img src="images/login.jpg" alt="Login" class="img-fluid">
            </div>
        </div>
    </div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
