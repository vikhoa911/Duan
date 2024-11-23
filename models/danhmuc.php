<?php


function update_danhmuc($id, $tenloai){
    $sql="update danh_muc set name='$tenloai' where id=$id";
    pdo_execute($sql);
}
function them_danh_muc($ten_danh_muc){
    $sql="insert into danh_muc(ten_danh_muc) values('$ten_danh_muc')";
    pdo_execute($sql);
}
function delete_danh_muc($id_danh_muc){
    $sql="delete from danh_muc where id=".$id_danh_muc;
    pdo_query($sql);
}
function loadall_danh_muc(){
    $sql="SELECT * FROM `danh_muc` WHERE 1";
    $listdanh_muc=pdo_query($sql);
    return $listdanh_muc;
}

function loadone_danh_muc($id_danh_muc){
    $sql="select * from danh_muc where id=".$id_danh_muc;
    $dm=pdo_query_one($sql);
    return $dm;
}
?>