<div class="row">
<div class="row mb-4">
        <h1 class="text-center text-primary mt-4">DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="container">
                <?php
                if (isset($thongbao) && ($thongbao != '')) {
                    echo '<div class="alert alert-success mt-3 text-center">' . $thongbao . '</div>';
                }
                ?>
            </div>
    <div class="row  container">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead  class="table-dark">
                    <tr>
                        <th>MÃ TÀI KHOẢN</th>
                        <th>TÊN ĐĂNG NHẬP</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>VAI TRÒ</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listtai_khoan as $taikhoan): ?>
                        <?php
                            extract($taikhoan);
                            $suatk = "index.php?act=suatk&id_tai_khoan=" . $id_tai_khoan;
                            $vai_tro_hien_thi = $vai_tro == 1 ? 'Quản trị viên' : 'Người dùng';
                            $dia_chi = !empty($dia_chi) ? $dia_chi : 'Chưa cập nhật';
                            $so_dien_thoai = !empty($so_dien_thoai) ? $so_dien_thoai : 'Chưa cập nhật';
                        ?>
                        <tr>
                            <td><?= $id_tai_khoan ?></td>
                            <td><?= $ten_dang_nhap ?></td>
                            <td><?= $email ?></td>
                            <td><?= $dia_chi ?></td>
                            <td><?= $so_dien_thoai ?></td>
                            <td><?= $vai_tro_hien_thi ?></td>
                            <td>
                                <a href="<?= $suatk ?>" class="btn btn-warning btn-sm me-2">Sửa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
