<?php
session_start();
include "../models/config.php";
include "../models/sanpham.php";
include "../models/danhmuc.php";
    include "header.php";

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'themdm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $ten_danh_muc = $_POST['ten_danh_muc'];
                    
                    them_danh_muc($ten_danh_muc);
                    $thongbao = 'Thêm thành công';
                }
                
                include "danhmuc/themdm.php";
                break;
                case 'xoadm':
                    if (isset($_GET['id']) && ($_GET['id'])>0) {
                        delete_danh_muc($_GET['id']);
                        $thongbao = 'Xóa thành công';
                    }
                    $listdanh_muc=loadall_danh_muc();
                    include "danhmuc/hienthidm.php";
                    break;
                
                    case 'suadm':
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                            $dm = loadone_danh_muc($_GET['id']);
                        }
                        include "danhmuc/update.php";
                        break;
                    
                        case 'updatedm':
                            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                                $ten_danh_muc = $_POST['ten_danh_muc'];
                                $id_danh_muc = $_POST['id']; // Lấy đúng tên biến 'id' từ input hidden
                                update_danhmuc($id_danh_muc, $ten_danh_muc);
                                $thongbao = 'Cập nhật thành công';
                            }
                            $listdanh_muc = loadall_danh_muc();
                            include "danhmuc/hienthidm.php";
                            break;
                        
            case 'hienthidm':
                $listdanh_muc=loadall_danh_muc();
                include "danhmuc/hienthidm.php";
                break;
            case 'themsp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $hinh = $_FILES['hinh']['name'];
                    $mo_ta = $_POST['mo_ta'];
                    $gia = $_POST['gia'];
                    $target_dir = "../images";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
            
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        them_sanpham($ten_san_pham, $hinh, $mo_ta, $gia, $id_danh_muc);
                        $thongbao = 'Thêm thành công';
                    } else {
                        $thongbao = 'Lỗi khi tải ảnh lên.';
                    }
                }
                $listdanh_muc = loadall_danhmuc();
                include "sanpham/themsp.php";
                break;
                case 'hienthi':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw=$_POST['kyw'];
                    $id_danh_muc=$_POST['id_danh_muc'];
                }
                else{
                    $kyw='';
                    $id_danh_muc=0;
                }
                $listdanh_muc=loadall_danh_muc();
                $listsanpham=loadall_sanpham($kyw,$id_danh_muc);
                include "sanpham/hienthi.php";
                break;
            
                
                    
                    
            default:
                include "home.php";
                break;
        }
    }
    else{
        include "home.php";
    }
    include "footer.php"
?>