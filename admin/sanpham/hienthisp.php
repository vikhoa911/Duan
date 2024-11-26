<div class="row">
    <div class="row formcontent  text-center mb-4">
        <h1>DANH SÁCH HÀNG HÓA</h1>
    </div>
    <div class="formtimkiem container mb-3">
        <form action="index.php?act=hienthisp" method="post" class="d-flex gap-2 align-items-center">
            <input type="text" name="kyw" class="form-control" placeholder="Nhập từ khóa...">
            <select name="id_danh_muc" class="form-select">
                <option value="0" selected>Tất Cả</option>
                <?php 
                foreach ($listdanh_muc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="'.$id_danh_muc.'">'.$ten_danh_muc.'</option>';
                }
                ?>
            </select>
            <input type="submit" name="listok" value="Tìm kiếm" class="btn btn-primary">
        </form>
    </div>
    <div class="row formcontent container">
        <div class="row mb-3 text-end">
            <a href="index.php?act=themsp" class="btn btn-primary">Nhập thêm</a>
        </div>
        <div class="row mb-3 formcontent">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>MÃ HÀNG HÓA</th>
                        <th>TÊN HÀNG HÓA</th>
                        <th>HÌNH</th>
                        <th>MÔ TẢ</th>
                        <th>GIÁ</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($listsan_pham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id_san_pham=" . $id_san_pham;
                        $xoasp = "index.php?act=xoasp&id_san_pham=" . $id_san_pham;
                        $hinhpath = "../images/" . $hinh;

                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinh = "no img";
                        }
                        echo '
                        <tr>
                            <td>' . $id_san_pham . '</td>
                            <td>' . $ten_san_pham . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . $mo_ta . '</td>
                            <td>' . $gia . '</td>
                            <td>
                                <a href="' . $suasp . '" class="btn btn-warning btn-sm">Sửa</a>
                                <hr>
                                <a href="' . $xoasp . '" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
