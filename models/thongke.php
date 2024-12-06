<?php
// Hàm thống kê sản phẩm bán trong ngày
function thong_ke_san_pham_ban_trong_ngay($ngay) { 
    $sql = "SELECT sp.id_san_pham, sp.ten_san_pham, SUM(gh.so_luong) AS so_luong_ban
FROM gio_hang gh
INNER JOIN san_pham sp ON gh.id_san_pham = sp.id_san_pham
INNER JOIN don_hang dh ON gh.id_don_hang = dh.id_don_hang
WHERE DATE(STR_TO_DATE(dh.ngay_dat_hang, '%h:%i:%s%p %d/%m/%Y')) = ?
GROUP BY sp.id_san_pham, sp.ten_san_pham
ORDER BY so_luong_ban DESC;
";
    return pdo_query($sql, $ngay);
}
function thong_ke_san_pham_theo_danh_muc() {
    $sql = "SELECT dm.id_danh_muc, dm.ten_danh_muc, COUNT(sp.id_san_pham) AS so_luong_san_pham
            FROM danh_muc dm
            LEFT JOIN san_pham sp ON dm.id_danh_muc = sp.id_danh_muc
            GROUP BY dm.id_danh_muc, dm.ten_danh_muc";
    return pdo_query($sql);
}
function thong_ke_san_pham_ban_chay($limit) {
    $sql = "SELECT sp.id_san_pham, sp.ten_san_pham, SUM(gh.so_luong) AS so_luong_ban
            FROM gio_hang gh
            INNER JOIN san_pham sp ON gh.id_san_pham = sp.id_san_pham
            GROUP BY sp.id_san_pham, sp.ten_san_pham
            ORDER BY so_luong_ban DESC
            LIMIT " . intval($limit);  // Chuyển $limit thành số nguyên
    return pdo_query($sql);  // Không cần truyền tham số $limit vào pdo_query nữa
}
function thong_ke_doanh_thu($ngay_bat_dau = null, $ngay_ket_thuc = null) {
    $sql = "SELECT SUM(gh.so_luong * sp.gia) AS doanh_thu
            FROM gio_hang gh
            INNER JOIN san_pham sp ON gh.id_san_pham = sp.id_san_pham
            INNER JOIN don_hang dh ON gh.id_don_hang = dh.id_don_hang";
    
    // Nếu có ngày bắt đầu và ngày kết thúc, thêm điều kiện WHERE
    if ($ngay_bat_dau && $ngay_ket_thuc) {
        $sql .= " WHERE DATE(STR_TO_DATE(dh.ngay_dat_hang, '%h:%i:%s%p %d/%m/%Y')) 
                    BETWEEN ? AND ?";
        return pdo_query_value($sql, $ngay_bat_dau, $ngay_ket_thuc);
    }
    // Nếu không có ngày cụ thể, tính tổng doanh thu
    return pdo_query_value($sql);
}
