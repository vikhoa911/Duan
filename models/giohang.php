<?php 
function viewcart($del){
    global $img_path;
    $tong = 0;
    $i = 0;

    // Thêm tiêu đề cho cột "Thao tác" nếu $del == 1
    $xoasp_th = $del == 1 ? '<th>Thao tác</th>' : '';

    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart['hinh'];
        $ttien = $cart['gia'] * $cart['so_luong'];
        $tong += $ttien;

        // Tạo nút xóa nếu $del == 1
        $xoasp_td = $del == 1 ? '<td><a href="index.php?act=delcart&id=' . $i . '"><input type="button" value="Xóa"></a></td>' : '';

        echo '<tr>
                <td><img src="' . $hinh . '" height="80px"></td>
                <td>' . $cart['ten_san_pham'] . '</td>
                <td>' . $cart['gia'] . '</td>
                <td>' . $cart['so_luong'] . '</td>
                <td>' . $ttien . '</td>
                ' . $xoasp_td . '
            </tr>';

        $i++; // Tăng chỉ số sản phẩm
    }

    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
        </tr>';
}

function tongdonhang(){
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart['gia'] * $cart['so_luong'];
        $tong += $ttien;
    }
    return $tong;
}

function insert_don_hang($id_tai_khoan, $ten_don_hang, $email, $dia_chi_don_hang, $so_dien_thoai_don_hang, $thanh_toan_don_hang, $ngay_dat_hang, $tong_tien_don_hang){
    $sql = "INSERT INTO don_hang (id_tai_khoan, ten_don_hang, dia_chi_don_hang, so_dien_thoai_don_hang, email_don_hang, thanh_toan_don_hang, ngay_dat_hang, tong_tien_don_hang) 
            VALUES ('$id_tai_khoan', '$ten_don_hang', '$email', '$dia_chi_don_hang', '$so_dien_thoai_don_hang', '$thanh_toan_don_hang', '$ngay_dat_hang', '$tong_tien_don_hang')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_gio_hang($id_tai_khoan, $id_san_pham, $hinh, $ten_san_pham, $gia, $so_luong, $thanhtien, $id_don_hang){
    $sql = "INSERT INTO gio_hang (id_tai_khoan, id_san_pham, hinh, ten_san_pham, gia, so_luong, thanhtien, id_don_hang) 
            VALUES ('$id_tai_khoan', '$id_san_pham', '$hinh', '$ten_san_pham', '$gia', '$so_luong', '$thanhtien', '$id_don_hang')";
    return pdo_execute($sql);
}

function loadone_don_hang($id_don_hang){
    $sql = "SELECT * FROM don_hang WHERE id_don_hang = " . $id_don_hang;
    $don_hang = pdo_query_one($sql);
    return $don_hang;
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

function billct($list_gio_hang){
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

function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;
        case '1':
            $tt = 'Đang xử lý';
            break;
        case '2':
            $tt = 'Đang giao hàng';
            break;
        case '3':
            $tt = 'Hoàn tất';
            break;
        default:
            $tt = 'Không xác định';
            break;
    }
    return $tt;
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
