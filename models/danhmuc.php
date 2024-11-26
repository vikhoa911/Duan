<?php

function update_danhmuc($id_danh_muc, $ten_danh_muc) {
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE id_danh_muc = '$id_danh_muc'";
    pdo_execute($sql);
}

function them_danh_muc($ten_danh_muc) {
    $sql = "INSERT INTO danh_muc (ten_danh_muc) VALUES ('$ten_danh_muc')";
    pdo_execute($sql);
}

function delete_danh_muc($id_danh_muc) {
    $sql = "DELETE FROM danh_muc WHERE id_danh_muc = $id_danh_muc";
    pdo_execute($sql);
}

function loadall_danh_muc() {
    $sql = "SELECT * FROM danh_muc WHERE 1";
    $listdanh_muc = pdo_query($sql);
    return $listdanh_muc;
}

function loadone_danh_muc($id_danh_muc) {
    $sql = "SELECT * FROM danh_muc WHERE id_danh_muc = $id_danh_muc";
    $dm = pdo_query_one($sql);
    return $dm;
}

?>
