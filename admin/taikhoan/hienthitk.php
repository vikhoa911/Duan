<div class="row">
    <div class="row formtitle mb-4">
        <h1 class="text-center">DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent container">
        <div class="row mb-3 formcontent">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>MÃ TÀI KHOẢN</th>
                        <th>TÊN ĐĂNG NHẬP</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>VAI TRÒ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($listtai_khoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id_tai_khoan=" . $id_tai_khoan;  // Cập nhật tham số
                        $xoatk = "index.php?act=xoatk&id_tai_khoan=" . $id_tai_khoan;  // Cập nhật tham số
                        echo '
                    <tr>
                        <td>' . $id_tai_khoan . '</td>  <!-- Sử dụng id_tai_khoan -->
                        <td>' . $ten_dang_nhap . '</td>  <!-- Sử dụng ten_dang_nhap -->
                        <td>' . $email . '</td>
                        <td>' . $dia_chi . '</td>  <!-- Sử dụng dia_chi -->
                        <td>' . $so_dien_thoai . '</td>  <!-- Sử dụng so_dien_thoai -->
                        <td>' . $vai_tro . '</td>  <!-- Cập nhật vai_tro nếu cần -->
                        <td>
                            <a href="' . $suatk . '" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="' . $xoatk . '" class="btn btn-danger btn-sm">Xóa</a>
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
