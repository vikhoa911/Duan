<?php
// Hàm đăng ký tài khoản
function dangky($ten_dang_nhap, $email, $mat_khau) {
    $sql = "INSERT INTO `tai_khoan` (ten_dang_nhap, email, mat_khau) VALUES ('$ten_dang_nhap', '$email', '$mat_khau');";
    pdo_execute($sql);
}
function check_user($ten_dang_nhap, $mat_khau){
    $sql="select * from tai_khoan where ten_dang_nhap='".$ten_dang_nhap."' AND  mat_khau='".$mat_khau."'";
    $sp=pdo_query_one($sql);
    // echo($sp);
    return $sp;
}


function update_tai_khoan($id_tai_khoan, $ten_dang_nhap, $mat_khau, $email, $dia_chi, $so_dien_thoai){
    $sql = "UPDATE tai_khoan SET ten_dang_nhap='$ten_dang_nhap', mat_khau='$mat_khau', email='$email', dia_chi='$dia_chi', so_dien_thoai='$so_dien_thoai' WHERE id_tai_khoan=$id_tai_khoan";
    pdo_execute($sql);
}

function delete_tai_khoan($id_tai_khoan){
    $sql = "DELETE FROM tai_khoan WHERE id_tai_khoan=" . $id_tai_khoan;
    pdo_execute($sql);
}

function loadall_tai_khoan(){
    $sql="select * from tai_khoan order by id_tai_khoan desc";
    $listtai_khoan=pdo_query($sql);
    return $listtai_khoan;
}

function loadone_tai_khoan($id_tai_khoan){
    $sql="select * from tai_khoan where id_tai_khoan=".$id_tai_khoan;
    $tai_khoan=pdo_query_one($sql);
    return $tai_khoan;
}

?>
