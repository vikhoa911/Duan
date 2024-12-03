<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">ĐƠN HÀNG CỦA TÔI</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">MÃ ĐƠN HÀNG</th>
                            <th scope="col">NGÀY ĐẶT</th>
                            <th scope="col">SỐ LƯỢNG MẶT HÀNG</th>
                            <th scope="col">TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th scope="col">TÌNH TRẠNG ĐƠN HÀNG</th>
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
                                    <td><strong>' . number_format($don_hang['tong_tien_don_hang'], 0, ',', '.') . ' VNĐ</strong></td>
                                    <td>' . htmlspecialchars($ttdh) . '</td>
                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-danger">Bạn chưa có đơn hàng nào.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
