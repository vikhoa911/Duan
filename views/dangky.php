<?php
session_start();

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
            <form action="/Duan/index.php?act=dangky" method="POST">
            <h1 class="text-center text-primary font-weight-bold mb-3 fs-1">Đăng ký</h1>

                    <a href="/Duan/index.php?act=dangky"></a>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" id="ten_dang_nhap" class="form-control " name="ten_dang_nhap" placeholder="Nhập tên đăng nhập" required style="width: 325px; height: 40px;"/>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control " placeholder="Nhập email" required style="width: 325px; height: 40px;"/>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="mat_khau">Mật khẩu</label>
                        <input type="password" name="mat_khau" id="mat_khau" class="form-control " placeholder="Nhập mật khẩu" required style="width: 325px; height: 40px;"/>
                    </div>
                    <p class="small mb-3">
                        <input type="checkbox" required> Đồng ý với điều khoản & dịch vụ
                    </p>
                    <button class="btn btn-primary w-100" type="submit" name="dangky" value="1">Đăng ký</button>

                    <a href="index.php?act=dangnhap" class="text">Đã có tài khoản?</a>
                    <?php if (isset($thongbao)) echo $thongbao; ?>

                </form>
                
            </div>
            
            <div class="col-md-6 ">
                <img src="https://img.freepik.com/free-vector/access-control-system-abstract-concept_335657-3180.jpg?t=st=1732821204~exp=1732824804~hmac=be2cc13bd020976d583fde03ab342652048615e990d268ef0729d492a79f17ab&w=740" alt="Login" class="img-fluid">
            </div>
          </div>
        </div>
    </section>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"></script>
    </body>
    </html>
    