<?php
function layDanhSachGioHang($del) {
        $html = '';
        if (!empty($_SESSION['mycart'])) {
            // Chỉ tạo phần đầu bảng một lần
            if ($del == 1) {
                $html .= '
                <thead class="bg-gray-200 text-sm font-medium text-gray-700">
                    <tr>
                        <th class="px-6 py-3">Sản Phẩm</th>
                        <th class="px-6 py-3">Giá</th>
                        <th class="px-6 py-3">Số Lượng</th>
                        <th class="px-6 py-3">Thành Tiền</th>
                        <th class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>';
            } else {
            }

            $html .= '<tbody class="text-sm text-gray-700">';
            
            // Lặp qua các sản phẩm trong giỏ hàng
            foreach ($_SESSION['mycart'] as $cart) {
                $img_path = "images/";
                $hinh_full_path = $img_path . $cart[2];
                $thanhtien = $cart[3] * $cart[4];
                
                // Thiết lập hành động xóa nếu cần
                if ($del == 1) {
                    $xoasp_td = '<button type="submit" class="btn btn-danger">Xóa</button>';
                } else {
                    $xoasp_td = '';
                }
                if($del == 2) {
                    $soluong= '<input 
                            disabled="disabled"
                            type="number" 
                            name="quantity" 
                            value="' . htmlspecialchars($cart[4]) . '" 
                            min="1" 
                            class="quantity-input w-12 text-center border rounded-md focus:outline-none focus:ring focus:ring-indigo-500"
                            data-product-id="' . htmlspecialchars($cart[0]) . '" 
                            data-product-price="' . htmlspecialchars($cart[3]) . '"
                        >';
                }else{
                    $soluong = '<input 
                            type="number" 
                            name="quantity" 
                            value="' . htmlspecialchars($cart[4]) . '" 
                            min="1" 
                            class="quantity-input w-12 text-center border rounded-md focus:outline-none focus:ring focus:ring-indigo-500"
                            data-product-id="' . htmlspecialchars($cart[0]) . '" 
                            data-product-price="' . htmlspecialchars($cart[3]) . '"
                        >';
                }
                
                // Thêm thông tin sản phẩm vào bảng
                $html .= '
                <tr class="border-t">
                    <td class="px-6 py-4 flex items-center space-x-4">
                        <img src="' . $hinh_full_path . '" alt="Product Image" class="w-16 h-16 rounded-lg">
                        <span class="product-name">' . htmlspecialchars($cart[1]) . '</span>
                    </td>
                    <td class="px-6 py-4" data-price="' . htmlspecialchars($cart[3]) . '">' . number_format($cart[3], 0, ',', '.') . ' VND</td>
                    <td class="px-6 py-4">
                    ' . $soluong . '
                        
                    </td>
                    <td class="px-6 py-4 product-total">' . number_format($thanhtien, 0, ',', '.') . ' VND</td>
                    <td class="px-6 py-4 text-center">
                        <form action="index.php?act=remove_cart" method="post">
                            <input type="hidden" name="cart_id" value="' . htmlspecialchars($cart[0]) . '">
                            ' . $xoasp_td . '
                        </form>
                    </td>
                </tr>';
            }

            // Đóng thẻ tbody
            $html .= '</tbody>';
        }
        return $html;
}


function tinhTongTien() {
    $tong = 0;
    if (!empty($_SESSION['mycart'])) {
        foreach ($_SESSION['mycart'] as $cart) {
            $tong += $cart[3] * $cart[4];
        }
    }
    return $tong;
}
function tongdonhang() {
    return tinhTongTien();
}
function insert_don_hang($id_tai_khoan, $ten_don_hang, $email_don_hang, $dia_chi_don_hang, $so_dien_thoai_don_hang, $thanh_toan_don_hang, $ngay_dat_hang, $tong_tien_don_hang, $ten_nhan = NULL, $dia_chi_nhan = NULL, $so_dien_thoai_nhan = NULL, $trang_thai_don_hang = 0) {
    $sql = "INSERT INTO don_hang (id_tai_khoan, ten_don_hang, dia_chi_don_hang, so_dien_thoai_don_hang, email_don_hang, thanh_toan_don_hang, ngay_dat_hang, tong_tien_don_hang, trang_thai_don_hang, ten_nhan, dia_chi_nhan, so_dien_thoai_nhan) 
            VALUES ('$id_tai_khoan', '$ten_don_hang', '$dia_chi_don_hang', '$so_dien_thoai_don_hang', '$email_don_hang', '$thanh_toan_don_hang', '$ngay_dat_hang', '$tong_tien_don_hang', '$trang_thai_don_hang', '$ten_nhan', '$dia_chi_nhan', '$so_dien_thoai_nhan')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_gio_hang($id_tai_khoan, $id_san_pham, $hinh, $ten_san_pham, $gia, $so_luong, $thanhtien, $id_don_hang) {
    // Kiểm tra và đảm bảo rằng so_luong không bị thiếu
    if (empty($so_luong) || $so_luong <= 0) {
        $so_luong = 1; // Mặc định số lượng là 1 nếu không có giá trị hợp lệ
    }

    // Kiểm tra và đảm bảo thanhtien không bị thiếu
    if (empty($thanhtien)) {
        $thanhtien = $gia * $so_luong; // Tính lại thành tiền nếu không có giá trị
    }

    // Câu lệnh SQL để thêm vào giỏ hàng
    $sql = "INSERT INTO gio_hang (id_tai_khoan, id_san_pham, hinh, ten_san_pham, gia, so_luong, thanhtien, id_don_hang) 
            VALUES ('$id_tai_khoan', '$id_san_pham', '$hinh', '$ten_san_pham', '$gia', '$so_luong', '$thanhtien', '$id_don_hang')";
    
    return pdo_execute($sql);
}



function loadone_don_hang($id_don_hang){
    $sql = "SELECT * FROM don_hang WHERE id_don_hang = " . $id_don_hang;
    $don_hang = pdo_query_one($sql);
    return $don_hang;
}
function loadall_chitiet_don_hang($id_don_hang) {
    // Câu truy vấn SQL để lấy thông tin chi tiết đơn hàng
    $sql = "SELECT * FROM gio_hang WHERE id_don_hang = " . $id_don_hang;
    
    // Thực thi câu truy vấn và trả về kết quả dưới dạng mảng
    $chitiet_don_hang = pdo_query($sql);
    
    // Trả về kết quả
    return $chitiet_don_hang;
}

function loadall_gio_hang($id_don_hang){
    $sql = "SELECT * FROM gio_hang WHERE id_don_hang = " . $id_don_hang;
    $gio_hang = pdo_query($sql);
    return $gio_hang;
}

function loadall_gio_hang_count($id_don_hang){
    $sql = "SELECT * FROM gio_hang WHERE id_don_hang = " . $id_don_hang;
    $gio_hang = pdo_query($sql);
    return sizeof($gio_hang);
}

function loadall_don_hang($kyw = "", $id_tai_khoan = 0){
    $sql = "SELECT * FROM don_hang WHERE 1";
    if ($id_tai_khoan > 0) $sql .= " AND id_tai_khoan = " . $id_tai_khoan;
    if ($kyw != "") $sql .= " AND id_don_hang LIKE '%" . $kyw . "%'";
    $sql .= " ORDER BY id_don_hang DESC";
    $list_don_hang = pdo_query($sql);
    return $list_don_hang;
}
function loadall_don_hang_kh($kyw = "", $id_tai_khoan = 0) {
    $sql = "SELECT * FROM don_hang WHERE 1";
    if ($id_tai_khoan > 0) $sql .= " AND id_tai_khoan = " . $id_tai_khoan; // Lọc theo tài khoản
    if ($kyw != "") $sql .= " AND id_don_hang LIKE '%" . $kyw . "%'";
    $sql .= " ORDER BY id_don_hang DESC";
    $list_don_hang = pdo_query($sql);
    return $list_don_hang;
}

function don_hang_chi_tiet($list_gio_hang){
    global $img_path;
    $tong = 0;

    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';

    foreach ($list_gio_hang as $cart) {
        $hinh = $img_path . $cart['hinh'];
        $tong += $cart['thanhtien'];
        echo '<tr>
                <td><img src="' . $hinh . '" height="80px"></td>
                <td>' . $cart['ten_san_pham'] . '</td>
                <td>' . $cart['gia'] . '</td>
                <td>' . $cart['so_luong'] . '</td>
                <td>' . $cart['thanhtien'] . '</td>
            </tr>';
    }

    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
        </tr>';
}

function get_ttdh($thanh_toan_don_hang) {
    switch ($thanh_toan_don_hang) {
        case 0:
            return "Đơn hàng mới";
        case 1:
            return "Đang chờ";
        case 2:
            return "Đang giao hàng";
        case 3:
            return "Đã giao hàng";
        default:
            return "Chưa xác định";
    }
}


function loadall_thongke(){
    $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, 
                   COUNT(sanpham.id) AS countsp, 
                   MIN(sanpham.price) AS minprice, 
                   MAX(sanpham.price) AS maxprice, 
                   AVG(sanpham.price) AS avgprice
            FROM sanpham 
            LEFT JOIN danhmuc ON danhmuc.id = sanpham.iddm
            GROUP BY danhmuc.id 
            ORDER BY danhmuc.id DESC";
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}

function update_don_hang($id_don_hang, $ten_don_hang, $tong_tien_don_hang) {
    $sql = "UPDATE don_hang SET ten_don_hang = ?, tong_tien_don_hang = ? WHERE id_don_hang = ?";
    pdo_execute($sql, $ten_don_hang, $tong_tien_don_hang, $id_don_hang);
}

function update_don_hang_status($id_don_hang, $trang_thai_don_hang) {
    $sql = "UPDATE don_hang SET trang_thai_don_hang = ? WHERE id_don_hang = ?";
    pdo_execute($sql, $trang_thai_don_hang, $id_don_hang);
}
?>
