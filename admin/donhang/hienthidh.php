<div class="container mt-5">
    <!-- Tiêu đề danh sách đơn hàng -->
    <div class="row mb-4">
        <h1 class="text-center text-primary">DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <!-- Nội dung bảng danh sách đơn hàng -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Thông Tin Khách Hàng</th>
                            <th scope="col">Số Lượng Hàng</th>
                            <th scope="col">Giá Trị Đơn Hàng</th>
                            <th scope="col">Tình Trạng Đơn Hàng</th>
                            <th scope="col">Ngày Đặt Hàng</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listdon_hang as $don_hang) {
                            extract($don_hang);
                            $xemdonhang = "index.php?act=xemdonhang&id_don_hang=" . $don_hang['id_don_hang'];
                            $kh = $don_hang["ten_don_hang"] . '
                                <br>' . $don_hang["email_don_hang"] . 'w
                                <br>' . $don_hang["dia_chi_don_hang"] . '
                                <br>' . $don_hang["so_dien_thoai_don_hang"];
                            $ttdh = get_ttdh($don_hang["trang_thai_don_hang"]);
                            $countsp = loadall_gio_hang_count($don_hang['id_don_hang']);
                            echo '<tr>
                                <td>' . $don_hang['id_don_hang'] . '</td>
                                <td>' . $kh . '</td>
                                <td>' . $countsp . '</td>
                                <td><strong>' . number_format($don_hang['tong_tien_don_hang'], 0, ',', '.') . ' USD</strong></td>
                                <td>' . $ttdh . '</td>
                                <td>' . $don_hang["ngay_dat_hang"] . '</td>
                                <td>
                                    <a href="' . $xemdonhang . '" class="btn btn-info btn-sm mt-4">Xem</a>
                                </td>
                            </tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
