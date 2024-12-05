<?php
session_start();
define('BASEURL','http://localhost/Duan');

include "models/config.php";
include "models/taikhoan.php";
include "models/giohang.php";
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
        
        case 'thoat':
            session_destroy();
            // header('Location: index.php');
            echo '<script>window.location='.BASEURL.'</script>';
            break;
        
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
                        $thongbao = "Chưa có tài khoản? <br> 
                                    <a href='index.php?act=dangky'>Đăng ký ngay?</a> ";
                    }
                }
                include "views/dangnhap.php";
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
            case 'thanhtoan':
            include "views/thanhtoan.php"; // Hiển thị trang giỏ hàng
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
            
                    // Thêm thông tin người nhận
                    $ten_nhan = $_POST['ten_dang_nhap'];  // Tên người nhận có thể được lấy từ form
                    $dia_chi_nhan = $_POST['dia_chi'];  // Địa chỉ nhận hàng
                    $so_dien_thoai_nhan = $_POST['so_dien_thoai'];  // Số điện thoại nhận hàng
            
                    // Lưu thông tin đơn hàng
                    $id_don_hang = insert_don_hang($id_tai_khoan, $ten_dang_nhap, $email, $dia_chi, $so_dien_thoai, $thanh_toan_don_hang, $ngay_dat_hang, $tongdonhang, $ten_nhan, $dia_chi_nhan, $so_dien_thoai_nhan);
            
                    // Lưu chi tiết đơn hàng
                    foreach ($_SESSION['mycart'] as $cart) {
                        $id_tai_khoan = $id_tai_khoan;  // ID người dùng
                        $id_san_pham = $cart[0];  // ID sản phẩm
                        $hinh = $cart[2];         // Hình ảnh sản phẩm
                        $ten_san_pham = $cart[1]; // Tên sản phẩm
                        $gia = $cart[3];          // Giá sản phẩm
                        $so_luong = $cart[4];     // Số lượng sản phẩm
                        $thanhtien = $cart[5];    // Thành tiền
                    
                        // Kiểm tra lại giá trị so_luong và thanhtien
                        insert_gio_hang($id_tai_khoan, $id_san_pham, $hinh, $ten_san_pham, $gia, $so_luong, $thanhtien, $id_don_hang);
                    }
                    
                    
            
                    // Xóa giỏ hàng sau khi đặt hàng
            
                    // Lấy thông tin đơn hàng để hiển thị
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
                case 'suatk':
                    if(isset($_GET['id_tai_khoan']) && ($_GET['id_tai_khoan'] > 0)){
                        $tai_khoan = loadone_tai_khoan($_GET['id_tai_khoan']);  // Cập nhật tham số
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
                            $id_tai_khoan = $_SESSION['ten_dang_nhap']['id_tai_khoan']; // Lấy id tài khoản từ session
                        } else {
                            $id_tai_khoan = 0;
                        }
                    
                        if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                            $kyw = $_POST['kyw'];
                        } else {
                            $kyw = "";
                        }
                    
                        // Lấy danh sách đơn hàng theo tài khoản
                        $listdon_hang = loadall_don_hang_kh($kyw, $id_tai_khoan);
                        include "views/donhangcuatoi.php";
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
