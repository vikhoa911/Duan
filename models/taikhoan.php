<?php
include_once "models/config.php";

// Hàm đăng ký tài khoản
function dangky($ten_dang_nhap, $email, $mat_khau) {
    $sql = "INSERT INTO `tai_khoan` (ten_dang_nhap, email, mat_khau) VALUES ('$ten_dang_nhap', '$email', '$mat_khau');";
    pdo_execute($sql);
}

// Hàm đăng nhập
function check_user($ten_dang_nhap, $mat_khau){
    $sql="select * from taikhoan where ten_dang_nhap='".$ten_dang_nhap."' AND  mat_khau='".$mat_khau."'";
    $sp=pdo_query_one($sql);
    return $sp;
}

?>
