<?php 
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    
    $hinhpath = "../images/".$img;
    if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='80'>";
    } else {
        $hinh = "no img";
    }
?>

<div class="row">
            <div class="row formtitle">
                <h1>CẬP NHẬT SẢN PHẨM</h1>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=sua" method="post" enctype="multipart/form-data">
                <div class="row mb10"> 
                <select name="id_danh_muc">
                            <option value="0" selected>Tất Cả</option>
                        <?php 
                        foreach ($listdanh_muc as $danhmuc){
                            if($id_danh_muc==$id) $s="selected"; else $s="";
                            echo '<option value="'.$danhmuc['id_danh_muc'].'" '.$selected.'>'.$danhmuc['ten_danh_muc'].'</option>';
                        }
                        ?>
                        </select>
                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="ten_san_pham" value="<?=$ten_san_pham?>">
                </div>
                <div class="row mb10">
                    Giá <br>
                    <input type="text" name="gia" value="<?=$gia?>">
                </div>
                <div class="row mb10">
                    Hình<br><?=$hinh?><br>
                    <input type="file" name="hinh">
                </div>
                <div class="row mb10">
                    Mô tả<br>
                    <textarea name="mo_ta" cols="30" rows="10"><?=$mo_ta?></textarea>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id_san_pham" value="<?=$id_san_pham?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=hienthisp"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php 
                    if(isset($thongbao)&&($thongbao!='')) echo $thongbao;
                ?>
                </form>
            </div>
        </div>
    </div>