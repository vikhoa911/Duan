<?php 
function them_sanpham($ten_san_pham, $hinh, $mo_ta, $gia, $id_danh_muc) {
    $sql = "INSERT INTO `san_pham`(`ten_san_pham`, `hinh`, `mo_ta`, `gia`, `id_danh_muc`) VALUES ('$ten_san_pham','$hinh','$mo_ta','$gia','$id_danh_muc')";
    pdo_execute($sql);
}
function delete_sanpham($id_san_pham){
    $sql="delete from san_pham where id=".$id_san_pham;
    pdo_query($sql);
}
function loadall_sanpham_home(){
    $sql="select * from san_pham where 1 order by id desc limit 0,9";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from san_pham where 1 order by luotxem desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw="", $id_danh_muc=0){
    $sql = "SELECT * FROM san_pham WHERE 1";
    if($kyw != "") {
        $sql .= " AND name LIKE '%$kyw%'";
    }
    if($id_danh_muc > 0) {
        $sql .= " AND id_danh_muc = '$id_danh_muc'"; // Đảm bảo id_danh_muc được thêm vào câu truy vấn
    }
    $sql .= " ORDER BY id_san_pham DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}



function load_ten_dm($id_danh_muc){
    if($id_danh_muc>0){
    $sql="select * from danh_muc where id=".$id_danh_muc;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }
    else{
        return "";
    }
    
}
function loadone_sanpham($id_san_pham){
    $sql="select * from san_pham where id=".$id_san_pham;
    $sp=pdo_query_one($sql);
    return $sp;
}
function loadone_sanpham_cungloai($id_san_pham,$id_danh_muc){
    $sql="select * from san_pham where id_danh_muc=".$id_danh_muc." AND id <> ".$id_san_pham;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id_san_pham, $id_danh_muc, $tensp, $giasp, $mota, $hinh){
    if($hinh != "") {
        $sql = "UPDATE san_pham SET id_danh_muc='$id_danh_muc', name='$tensp', price='$giasp', mota='$mota', img='$hinh' WHERE id=$id_san_pham";
    } else {
        $sql = "UPDATE san_pham SET id_danh_muc='$id_danh_muc', name='$tensp', price='$giasp', mota='$mota' WHERE id=$id_san_pham";
    }
    pdo_execute($sql);
}

function loadall_danhmuc() {
    $sql = "SELECT * FROM danh_muc";
    return pdo_query($sql);
}


?>