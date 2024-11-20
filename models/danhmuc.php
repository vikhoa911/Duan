<?php

function insert_danhmuc(){
    $sql="insert into danh_muc(name) values('$tenloai')";
    pdo_execute($sql);
}

function update_danhmuc($id, $tenloai){
    $sql="update danh_muc set name='$tenloai' where id=$id";
    pdo_execute($sql);
}



?>