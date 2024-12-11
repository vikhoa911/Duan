<?php
session_start();
include "models/config.php";
include "models/taikhoan.php";
include "models/giohang.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
if (isset($_POST['cart_id'])) {
    $cart_id_to_remove = $_POST['cart_id'];
    foreach ($_SESSION['mycart'] as $key => $cart) {
        if ($cart[0] == $cart_id_to_remove) {
            unset($_SESSION['mycart'][$key]);
            break;
        }
    }
    $_SESSION['mycart'] = array_values($_SESSION['mycart']);
    header("Location: index.php?act=giohang");
    exit();
}
if (isset($_GET['act']) && $_GET['act'] === 'update_cart') {
    $input = json_decode(file_get_contents("php://input"), true);
    $productId = $input['id'];
    $newQuantity = $input['quantity'];

    foreach ($_SESSION['mycart'] as &$cartItem) {
        if ($cartItem[0] == $productId) {
            $cartItem[4] = $newQuantity;
            break;
        }
    }
    echo json_encode(["status" => "success", "message" => "Cart updated successfully"]);
    exit();
}
include "views/header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'thoat':
            session_destroy();
            header('Location: index.php');
            exit();
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                try {
                    dangky($ten_dang_nhap, $email, $mat_khau);
                    $thongbao = "Đăng ký thành công!";
                } catch (Exception $e) {
                    $thongbao = "Đăng ký thất bại: " . $e->getMessage();
                }
            }
            include "views/dangky.php";
            break;
            case 'dangnhap':
                if (isset($_POST['dangnhap'])) {
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $mat_khau = $_POST['mat_khau'];
                    $checkuser = check_user($ten_dang_nhap, $mat_khau);
            
                    if (is_array($checkuser)) {
                        $_SESSION['ten_dang_nhap'] = $checkuser;
            
                        // Kiểm tra vai trò
                        if ($checkuser['vai_tro'] == 1) {
                            header('Location: admin/index.php');
                        } else {
                            header('Location: index.php');
                        }
                        exit();
                    } else {
                        $thongbao = "Chưa có tài khoản? <br> <a href='index.php?act=dangky'>Đăng ký ngay?</a>";
                    }
                }
                include "views/dangnhap.php";
                break;
            
        case 'home2':
            include "views/home2.php";
            break;
        case 'nam':
            include "views/nam.php";
            break;

        case 'nu':
            include "views/nu.php";
            break;

        case 'sale':
            include "views/sale.php";
            break;

        case 'chitietsp':
            if (isset($_GET['id_san_pham']) && $_GET['id_san_pham'] != "") {
                $id_san_pham = $_GET['id_san_pham'];
                include "models/sanpham.php";
                $sanpham = loadone_san_pham($id_san_pham);

                if ($sanpham) {
                    include "views/spct.php";
                } else {
                    echo "<p>Sản phẩm không tồn tại.</p>";
                }
            } else {
                header("Location: index.php");
            }
            break;
        case 'themgiohang':
            if (isset($_POST['themgiohang']) && ($_POST['themgiohang'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $hinh = $_POST['hinh'];
                $soluong = (int)$_POST['soluong'];
                $gia = (float)$_POST['gia'];
                $thanhtien = $soluong * $gia;
                $spadd = [$id_san_pham, $ten_san_pham, $hinh, $gia, $soluong, $thanhtien];
                $_SESSION['mycart'][] = $spadd;
            }
            include "views/giohang.php";
            break;


        case 'giohang':
            include "views/giohang.php";
            break;
        case 'thanhtoan':
            include "views/thanhtoan.php";
            break;
        case 'dat_hang':
            if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                $id_tai_khoan = isset($_SESSION['ten_dang_nhap']) ? $_SESSION['ten_dang_nhap']['id_tai_khoan'] : 0;
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $thanh_toan_don_hang = $_POST['thanh_toan_don_hang'];
                $ngay_dat_hang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                $ten_nhan = $_POST['ten_dang_nhap'];
                $dia_chi_nhan = $_POST['dia_chi'];
                $so_dien_thoai_nhan = $_POST['so_dien_thoai'];
                $id_don_hang = insert_don_hang($id_tai_khoan, $ten_dang_nhap, $email, $dia_chi, $so_dien_thoai, $thanh_toan_don_hang, $ngay_dat_hang, $tongdonhang, $ten_nhan, $dia_chi_nhan, $so_dien_thoai_nhan);
                foreach ($_SESSION['mycart'] as $cart) {
                    // $id_tai_khoan = $id_tai_khoan;
                    $id_san_pham = $cart[0];
                    $hinh = $cart[2];
                    $ten_san_pham = $cart[1];
                    $gia = $cart[3];
                    $so_luong = $cart[4];
                    $thanhtien = $cart[5];
                    insert_gio_hang($id_tai_khoan, $id_san_pham, $hinh, $ten_san_pham, $gia, $so_luong, $thanhtien, $id_don_hang);
                }
                $don_hang = loadone_don_hang($id_don_hang);
                $don_hangct = loadall_gio_hang($id_don_hang);

                if (empty($don_hangct)) {
                    $thongbao = "Không tìm thấy chi tiết đơn hàng.";
                }
                $listdon_hang = $don_hangct;
                include "views/hoanthanhdonhang.php";
            } else {
                $thongbao = "Yêu cầu không hợp lệ.";
            }
            break;
        case 'quenmatkhau':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['mat_khau'];
                } else {
                    $thongbao = "Email không tồn tại !";
                }
            }
            include "views/quenmatkhau.php";
            break;
        case 'suatk':
            if (isset($_GET['id_tai_khoan']) && ($_GET['id_tai_khoan'] > 0)) {
                $tai_khoan = loadone_tai_khoan($_GET['id_tai_khoan']);
            }
            include "views/suataikhoan.php";
            break;
        case 'suataikhoan':
            if (isset($_GET['id_tai_khoan']) && ($_GET['id_tai_khoan'] > 0)) {
                $tai_khoan = loadone_tai_khoan($_GET['id_tai_khoan']);
            }
            if (isset($_POST['capnhat'])) {
                $id_tai_khoan = $_POST['id_tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                sua_tai_khoan($id_tai_khoan, $mat_khau, $email, $dia_chi, $so_dien_thoai);
                $thongbao = 'Cập nhật tài khoản thành công';
            }
            include "views/suathanhcong.php";
            break;
            case 'donhangcuatoi':
                
                if (isset($_SESSION['ten_dang_nhap'])) {
                    $id_tai_khoan = $_SESSION['ten_dang_nhap']['id_tai_khoan'];
                }
                $listdon_hang = loadall_don_hang_kh($id_tai_khoan);
                include "views/donhangcuatoi.php";
                break;
            
            case 'donhangchitiet':
                if (isset($_GET['id_don_hang']) && ($_GET['id_don_hang'] > 0)) {
                    $don_hang = loadone_don_hang($_GET['id_don_hang']);
                    $chitiet_don_hang = loadall_chitiet_don_hang($_GET['id_don_hang']);
                }
                include "views/donhangchitiet.php";
                break;
            
        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}

include "views/footer.php";
