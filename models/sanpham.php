<?php 
function them_san_pham($ten_san_pham, $hinh, $mo_ta, $gia, $id_danh_muc) {
    $sql = "INSERT INTO `san_pham`(`ten_san_pham`, `hinh`, `mo_ta`, `gia`, `id_danh_muc`) VALUES ('$ten_san_pham','$hinh','$mo_ta','$gia','$id_danh_muc')";
    pdo_execute($sql);
}
function delete_san_pham($id_san_pham){
    $sql="delete from san_pham where id_san_pham=".$id_san_pham;
    pdo_query($sql);
}
function loadall_san_pham_home(){
    $sql="select * from san_pham where 1 order by id desc limit 0,9";
    $listsan_pham=pdo_query($sql);
    return $listsan_pham;
}
function loadall_san_pham_top10(){
    $sql="select * from san_pham where 1 order by luotxem desc limit 0,10";
    $listsan_pham=pdo_query($sql);
    return $listsan_pham;
}
function loadall_san_pham($kyw="", $id_danh_muc=0){
    $sql = "SELECT * FROM san_pham WHERE 1";
    if($kyw != "") {
        $sql .= " AND name LIKE '%$kyw%'";
    }
    if($id_danh_muc > 0) {
        $sql .= " AND id_danh_muc = '$id_danh_muc'"; // Đảm bảo id_danh_muc được thêm vào câu truy vấn
    }
    $sql .= " ORDER BY id_san_pham DESC";
    $listsan_pham = pdo_query($sql);
    return $listsan_pham;
}



function load_ten_dm($id_danh_muc){
    if($id_danh_muc>0){
    $sql="select * from danh_muc where id_danh_muc=".$id_danh_muc;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }
    else{
        return "";
    }
    
}
function loadone_san_pham($id_san_pham){
    $sql="select * from san_pham where id_san_pham=".$id_san_pham;
    $sp=pdo_query_one($sql);
    return $sp;
}
function loadone_san_pham_cungloai($id_san_pham,$id_danh_muc){
    $sql="select * from san_pham where id_danh_muc=".$id_danh_muc." AND id_san_pham <> ".$id_san_pham;
    $listsan_pham=pdo_query($sql);
    return $listsan_pham;
}

function update_san_pham($id_san_pham, $id_danh_muc, $ten_san_pham, $gia, $mo_ta, $hinh) {
    if ($hinh != "") {
        $sql = "UPDATE san_pham SET 
                    id_danh_muc='$id_danh_muc', 
                    ten_san_pham='$ten_san_pham', 
                    gia='$gia', 
                    mo_ta='$mo_ta', 
                    hinh='$hinh' 
                WHERE id_san_pham=$id_san_pham";
    } else {
        $sql = "UPDATE san_pham SET 
                    id_danh_muc='$id_danh_muc', 
                    ten_san_pham='$ten_san_pham', 
                    gia='$gia', 
                    mo_ta='$mo_ta' 
                WHERE id_san_pham=$id_san_pham";
    }
    pdo_execute($sql);
}


function loadall_danhmuc() {
    $sql = "SELECT * FROM danh_muc";
    return pdo_query($sql);
}


?>