<?php 
function insert_binhluan($noi_dung, $id_tai_khoan, $id_san_pham, $thoi_gian, $danh_gia) {
    $sql = "INSERT INTO binh_luan (noi_dung, id_tai_khoan, id_san_pham, thoi_gian, danh_gia) 
            VALUES ('$noi_dung', '$id_tai_khoan', '$id_san_pham', '$thoi_gian', '$danh_gia')";
    pdo_execute($sql);
}

function loadall_binhluan($id_binh_luan) {
    $sql = "SELECT * FROM binh_luan WHERE 1";
    if ($id_binh_luan > 0) $sql .= " AND id_binh_luan=" . $id_binh_luan;
    $sql .= " ORDER BY id_binh_luan DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}

function delete_binhluan($id_binh_luan) {
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan=" . $id_binh_luan;
    pdo_execute($sql);
}
?>
