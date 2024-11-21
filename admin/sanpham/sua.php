<?php 
    if(is_array($san_pham)){
        extract($san_pham);
    }
    $hinhpath="../upload/".$img;
            if(is_file($hinhpath)){
            $hinh="<img src='" . $hinhpath . "' height='80'>";
    }else{
        $hinh="no img";
    }
?>
<div class="row">
            <div class="row formtitle">
                <h1>CẬP NHẬT SẢN PHẨM</h1>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="row mb10"> 
                <select name="iddm">
                            <option value="0" selected>Tất Cả</option>
                        <?php 
                        foreach ($listdanhmuc as $danhmuc){
                            if($iddm==$id) $s="selected"; else $s="";
                            echo '<option value="'.$danhmuc['id'].'" '.$selected.'>'.$danhmuc['name'].'</option>';
                        }
                        ?>
                        </select>
                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp" value="<?=$name?>">
                </div>
                <div class="row mb10">
                    Giá <br>
                    <input type="text" name="giasp" value="<?=$price?>">
                </div>
                <div class="row mb10">
                    Hình<br><?=$hinh?><br>
                    <input type="file" name="hinh">
                </div>
                <div class="row mb10">
                    Mô tả<br>
                    <textarea name="mota" cols="30" rows="10"><?=$mota?></textarea>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php 
                    if(isset($thongbao)&&($thongbao!='')) echo $thongbao;
                ?>
                </form>
            </div>
        </div>
    </div>