<?php
// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng về trang chủ
if (isset($_SESSION['ten_dang_nhap'])) {
    header('Location: index.php'); // Quay về trang chủ
    exit();
}
?>
<section class="ResetPassword">
    <div class="container">
        <div class="row container">
            <!-- Form Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <form action="index.php?act=quenmatkhau" method="post">
                    <h1 class="text-center text-primary font-weight-bold mb-4 fs-1">Quên mật khẩu</h1>
                    <div class="form-outline mb-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email của bạn" required style="width: 325px; height: 40px;">
                    </div>
                    <input type="submit" class="btn btn-primary w-100 mt-2" value="Gửi" name="guiemail">
                    <button type="reset" class="btn btn-secondary w-100 mt-2">Nhập lại</button>
                    <?php if (isset($thongbao)) echo "<p class='text-danger mt-3'>$thongbao</p>"; ?>
                </form>
            </div>
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="https://img.freepik.com/free-vector/password-reset-concept-illustration_114360-7883.jpg?w=740" alt="Reset Password" class="img-fluid">
            </div>
        </div>
    </div>
</section>
