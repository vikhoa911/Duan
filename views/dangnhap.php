<?php

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng về trang chủ
if (isset($_SESSION['ten_dang_nhap'])) {
    header('Location: index.php'); // Quay về trang chủ
    exit();
}
?>
<section class="Login1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <form action="index.php?act=dangnhap" method="post">
                    <h1 class="text-center text-primary font-weight-bold mb-4 fs-1">Đăng nhập</h1>
                    <div class="form-outline mb-4">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control" placeholder="Nhập tên đăng nhập" required style="width: 325px; height: 40px;">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" id="mat_khau" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required style="width: 325px; height: 40px;">
                    </div>
                    <button type="submit" name="dangnhap" class="btn btn-primary w-100">Đăng nhập</button>
                    <?php if (isset($thongbao)) echo "<p class='text-danger'>$thongbao</p>"; ?>
                </form>
            </div>
            <div class="col-md-6 ">
                <img src="https://img.freepik.com/free-vector/access-control-system-abstract-concept_335657-3180.jpg?t=st=1732821204~exp=1732824804~hmac=be2cc13bd020976d583fde03ab342652048615e990d268ef0729d492a79f17ab&w=740" alt="Login" class="img-fluid">
            </div>
        </div>
    </div>
</section>
