<div class="container my-5">
<h3 class="text-center mb-5">ĐƠN HÀNG CỦA TÔI</h3>
    <div class="row mb-5">
        <div class="col-12 mb-5">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center mb-5">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">MÃ ĐƠN HÀNG</th>
                            <th scope="col">NGÀY ĐẶT</th>
                            <th scope="col">SỐ LƯỢNG MẶT HÀNG</th>
                            <th scope="col">TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th scope="col">TÌNH TRẠNG ĐƠN HÀNG</th>
                            <th scope="col">HÀNH ĐỘNG</th> <!-- Cột hành động -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($listdon_hang)) {
                            foreach ($listdon_hang as $don_hang) {
                                extract($don_hang);
                                $ttdh = get_ttdh($don_hang["trang_thai_don_hang"]);
                                $countsp = loadall_gio_hang_count($don_hang['id_don_hang']);
                                echo '<tr>
                                    <td>' . htmlspecialchars($don_hang['id_don_hang']) . '</td>
                                    <td>' . htmlspecialchars($don_hang['ngay_dat_hang']) . '</td>
                                    <td>' . (isset($countsp) ? htmlspecialchars($countsp) : 'N/A') . '</td>
                                    <td><strong>' . number_format($don_hang['tong_tien_don_hang'], 0, ',', '.') . ' USD</strong></td>
                                    <td>' . htmlspecialchars($ttdh) . '</td>
                                    <td>
                                        <a href="index.php?act=donhangchitiet&id_don_hang=' . $don_hang['id_don_hang'] . '" class="btn btn-info">Xem chi tiết</a>
                                    </td> <!-- Nút xem chi tiết -->
                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-danger">Bạn chưa có đơn hàng nào.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="mb-5">
<br>
</div>
