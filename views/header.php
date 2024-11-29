<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vask Clothes</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/htsp.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=nam">NAM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=nu">NỮ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=khac">KHÁC</a>
                    </li>
                </ul>
                <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="index.php?act=sanpham" method="post">
                            <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm sản phẩm...">
                            <input type="submit" class="btn btn-primary" name="timkiem" value="Tìm kiếm">
                        </form>
                    </li>
                </ul> -->
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION['ten_dang_nhap'])) {
                        extract($_SESSION['ten_dang_nhap']); ?>
                        <!-- Hiển thị tên người dùng -->
                        <li class="nav-item">
                            <a class="nav-link">Xin chào, <span style="color: red; text-transform: uppercase; font-weight: bold;"><?= $ten_dang_nhap; ?></span></a>
                        </li>
                        <!-- Đơn hàng của tôi -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=giohang"><i class="fas fa-receipt"></i> Đơn hàng</a>
                        </li>
                        <!-- Đăng xuất -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=thoat"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </li>
                        <!-- Đăng nhập admin nếu vai trò là admin -->
                        <?php
                        if ($vai_tro == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/index.php"><i class="fas fa-user-shield"></i> Admin</a>
                            </li>
                        <?php } ?>
                    <?php
                    } else {
                    ?>
                        <!-- Nếu chưa đăng nhập -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dangnhap"><i class="fas fa-user"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dangky"><i class="fas fa-user-plus"></i></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
