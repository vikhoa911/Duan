<?php
// Hàm đăng ký tài khoản
function dangky($ten_dang_nhap, $email, $mat_khau) {
    $sql = "INSERT INTO `tai_khoan` (ten_dang_nhap, email, mat_khau) VALUES ('$ten_dang_nhap', '$email', '$mat_khau');";
    pdo_execute($sql);
}
// Hàm đăng nhập tài khoản
function check_user($ten_dang_nhap, $mat_khau){
    $sql="select * from tai_khoan where ten_dang_nhap='".$ten_dang_nhap."' AND  mat_khau='".$mat_khau."'";
    $sp=pdo_query_one($sql);
    // echo($sp);
    return $sp;
}


// Hàm cập nhật tài khoản
function update_tai_khoan($id_tai_khoan, $ten_dang_nhap, $email, $dia_chi, $so_dien_thoai, $vai_tro) {
    $sql = "UPDATE tai_khoan SET email = ?, dia_chi = ?, so_dien_thoai = ?, vai_tro = ? WHERE id_tai_khoan = ?";
    pdo_execute($sql, $email, $dia_chi, $so_dien_thoai, $vai_tro, $id_tai_khoan);
}


// Hàm xóa tài khoản
function delete_tai_khoan($id_tai_khoan){
    $sql = "DELETE FROM tai_khoan WHERE id_tai_khoan=" . $id_tai_khoan;
    pdo_execute($sql);
}

// Hàm hiển thị all tài khoản
function loadall_tai_khoan(){
    $sql="select * from tai_khoan order by id_tai_khoan desc";
    $listtai_khoan=pdo_query($sql);
    return $listtai_khoan;
}

// Hàm chọn tài khoản
function loadone_tai_khoan($id_tai_khoan){
    $sql="select * from tai_khoan where id_tai_khoan=".$id_tai_khoan;
    $tai_khoan=pdo_query_one($sql);
    return $tai_khoan;
}

?>
