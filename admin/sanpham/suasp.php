<?php 
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    
    $hinhpath = "../images/".$hinh;
    if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='550' width='550'";
    } else {
        $hinh = "no img";
    }
?>

<div class="row">
            <div class="row formtitle mb-4">
                <h1 class="text-center">CẬP NHẬT SẢN PHẨM</h1>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=sua" method="post" enctype="multipart/form-data">
                <div class="row mb-3"> 
                <select name="id_danh_muc" class="form-select">
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
                <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" value="<?=$ten_san_pham?>">
                </div>
                <div class="row mb10">
                <label for="gia" class="form-label">Giá</label>
                    <input type="text" name="gia" value="<?=$gia?>">
                </div>
                <div class="row mb10">
                <label for="hinh" class="form-label">Hình</label><br><?=$hinh?><br>
                    <input type="file" name="hinh">
                </div>
                <div class="row mb10">
                <label for="mo_ta" class="form-label">Mô tả</label><br>
                    <textarea name="mo_ta" cols="30" rows="10"><?=$mo_ta?></textarea>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id_san_pham" value="<?=$id_san_pham?>">
                    <input type="submit" name="capnhat" class="btn btn-primary" value="CẬP NHẬT"> 
                    <input type="reset" class="btn btn-secondary" value="NHẬP LẠI">
                    <hr><a href="index.php?act=hienthisp" class="btn btn-info">
    <button type="button" class="btn btn-info">DANH SÁCH</button>
</a>

                </div>
                <?php 
                    if(isset($thongbao)&&($thongbao!='')) echo $thongbao;
                ?>
                </form>
            </div>
        </div>
    </div>