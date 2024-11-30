<?php
session_start();
include "models/config.php";
include "models/taikhoan.php";
include "views/header.php"; // Đưa header vào đầu
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
if (isset($_POST['cart_id'])) {
    $cart_id_to_remove = $_POST['cart_id'];

    // Duyệt qua giỏ hàng và xóa sản phẩm có ID tương ứng
    foreach ($_SESSION['mycart'] as $key => $cart) {
        if ($cart[0] == $cart_id_to_remove) {
            unset($_SESSION['mycart'][$key]); // Xóa sản phẩm khỏi giỏ hàng
            break; // Dừng lại khi tìm thấy sản phẩm cần xóa
        }
    }

    // Cập nhật lại giỏ hàng sau khi xóa
    $_SESSION['mycart'] = array_values($_SESSION['mycart']);
    
    // Chuyển hướng lại trang giỏ hàng để cập nhật giao diện
    header("Location: index.php?act=giohang");
    exit();
}
if (isset($_GET['act']) && $_GET['act'] === 'update_cart') {
    $input = json_decode(file_get_contents("php://input"), true);
    $productId = $input['id'];
    $newQuantity = $input['quantity'];

    foreach ($_SESSION['mycart'] as &$cartItem) {
        if ($cartItem[0] == $productId) {
            $cartItem[4] = $newQuantity; // Cập nhật số lượng trong session
            break;
        }
    }
    echo json_encode(["status" => "success", "message" => "Cart updated successfully"]);
    exit();
}



if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];

                try {
                    // Gọi hàm dangky để thêm tài khoản
                    dangky($ten_dang_nhap, $email, $mat_khau);
                    $thongbao = "Đăng ký thành công!";
                } catch (Exception $e) {
                    $thongbao = "Đăng ký thất bại: " . $e->getMessage();
                }
            }
            include "views/dangky.php"; // Hiển thị form đăng ký
            break;

            case 'dangnhap':
                if (isset($_POST['dangnhap'])) {
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $mat_khau = $_POST['mat_khau'];
                    $checkuser = check_user($ten_dang_nhap, $mat_khau);
                    
                    if (is_array($checkuser)) {
                        $_SESSION['ten_dang_nhap'] = $checkuser;
                        header('Location:index.php');
                    } else {
                        // Thêm thông báo lỗi với liên kết "Quên mật khẩu" và "Đăng ký"
                        $thongbao = "Sai tài khoản hoặc mật khẩu! <br> 
                                    <a href='index.php?act=quenmatkhau'>Quên mật khẩu?</a> ";
                    }
                }
                include "views/dangnhap.php";
                break;
            

        case 'thoat':
            session_destroy();
            header('Location:index.php');
            break;
            case 'home2':
                include "views/home2.php"; // Hiển thị trang "nam"
                break;
        case 'nam':
            include "views/nam.php"; // Hiển thị trang "nam"
            break;

        case 'nu':
            include "views/nu.php"; // Hiển thị trang "nu"
            break;

        case 'khac':
            include "views/khac.php"; // Hiển thị trang "khác"
            break;

        case 'chitietsp':
            if (isset($_GET['id_san_pham']) && $_GET['id_san_pham'] != "") {
                $id_san_pham = $_GET['id_san_pham'];
                include "models/sanpham.php"; // File xử lý sản phẩm
                $sanpham = loadone_san_pham($id_san_pham); // Lấy thông tin sản phẩm theo ID từ cơ sở dữ liệu

                if ($sanpham) {
                    include "views/spct.php"; // Trang chi tiết sản phẩm
                } else {
                    echo "<p>Sản phẩm không tồn tại.</p>";
                }
            } else {
                header("Location: index.php"); // Nếu không có id_san_pham, chuyển hướng về trang chủ
            }
            break;
            case 'themgiohang':
                if (isset($_POST['themgiohang']) && ($_POST['themgiohang'])) {
                    $id_san_pham = $_POST['id_san_pham'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $hinh = $_POST['hinh'];
                    $soluong = (int)$_POST['soluong']; // Chuyển đổi thành số nguyên
$gia = (float)$_POST['gia']; // Chuyển đổi thành số thực

$thanhtien = $soluong * $gia; // Phép nhân hợp lệ

                    $spadd = [$id_san_pham, $ten_san_pham, $hinh, $gia, $soluong, $thanhtien];
            
                    // Lưu sản phẩm mới vào giỏ hàng (không ghi đè các sản phẩm cũ)
                    $_SESSION['mycart'][] = $spadd; 
                }
                include "views/giohang.php";
                break;
            
            
        case 'giohang':
            include "views/giohang.php"; // Hiển thị trang giỏ hàng
            break;
        default:
            include "views/home.php"; // Hiển thị trang chủ khi không có hành động nào
            break;
    }
} else {
    include "views/home.php"; // Hiển thị trang chủ mặc định
}

include "views/footer.php"; // Đưa footer vào cuối trang
?>
