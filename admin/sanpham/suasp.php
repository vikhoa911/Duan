<?php 
    if (is_array($sanpham)) {
        extract($sanpham);
    }

    $hinhpath = "../images/".$hinh;
    if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='550' width='550'>";
    } else {
        $hinh = "no img";
    }
?>

<div class="container mt-5">
    <div class="row formcontent mb-4">
        <h1 class="text-center">CẬP NHẬT SẢN PHẨM</h1>
    </div>
    
    <div class="row container">
        <form action="index.php?act=sua" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
            <div class="mb-3">
                <label for="id_danh_muc" class="form-label">Danh mục</label>
                <select name="id_danh_muc" class="form-select">
                    <option value="0" selected>Tất Cả</option>
                    <?php 
                    foreach ($listdanh_muc as $danhmuc) {
                        $selected = ($id_danh_muc == $danhmuc['id_danh_muc']) ? "selected" : "";
                        echo '<option value="'.$danhmuc['id_danh_muc'].'" '.$selected.'>'.$danhmuc['ten_danh_muc'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" class="form-control" value="<?=$ten_san_pham?>">
            </div>

            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="text" name="gia" class="form-control" value="<?=$gia?>">
            </div>

            <div class="mb-3">
                <label for="hinh" class="form-label">Hình</label><br>
                <?=$hinh?><br>
                <input type="file" name="hinh" class="form-control">
            </div>

            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea name="mo_ta" class="form-control" cols="30" rows="10"><?=$mo_ta?></textarea>
            </div>

            <div class="mb-3 d-flex gap-2">
                <input type="hidden" name="id_san_pham" value="<?=$id_san_pham?>">
                <input type="submit" name="capnhat" class="btn btn-primary" value="CẬP NHẬT"> 
                <input type="reset" class="btn btn-secondary" value="NHẬP LẠI">
            </div>

            <div class="mb-3">
                <a href="index.php?act=hienthisp" class="btn btn-info">DANH SÁCH</a>
            </div>

            <?php 
                if (isset($thongbao) && ($thongbao != '')) {
                    echo '<div class="alert alert-info">'.$thongbao.'</div>';
                }
            ?>
        </form>
    </div>
</div>
