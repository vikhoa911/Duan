<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vask Clothes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Duan/Duan/views/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">NAM</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">NỮ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">KHÁC</a></li>
                </ul>
                <a class="navbar-brand titleshop" href="/Duan/Duan/index.php">VASK STORE</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-plus"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-basket"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="Login1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <form action="/Duan/Duan/index.php?act=dangnhap" method="post">
                        <h3 class="text-center mb-4">Đăng nhập</h3>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="ten_dang_nhap">Tên đăng nhập</label>
                            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control form-control-lg" required />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="mat_khau">Mật khẩu</label>
                            <input type="password" id="mat_khau" name="mat_khau" class="form-control form-control-lg" required />
                        </div>
                        <button class="btn btn-info btn-lg btn-block w-100 mb-4" type="submit" name="dangnhap">Đăng nhập</button>
                        <br>
                        <?php if (isset($thongbao)) echo $thongbao; ?>

                    </form>
                </div>

                <div class="col-md-6 img-container">
                    <img src="/Duan/Duan/images/login.jpg" alt="Login image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
