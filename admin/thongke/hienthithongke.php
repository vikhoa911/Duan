<?php
$ngay = date('Y-m-d');
$thong_ke = thong_ke_san_pham_ban_trong_ngay($ngay);
$thong_ke_danh_muc = thong_ke_san_pham_theo_danh_muc();
$thong_ke_ban_chay = thong_ke_san_pham_ban_chay(10);
$doanh_thu_hom_nay = thong_ke_doanh_thu($ngay, $ngay); // Doanh thu hôm nay
$doanh_thu_tong = thong_ke_doanh_thu(); // Tổng doanh thu
?>

<div class="container">
    <div class="row mb-4">
    <h2 class="text-center text-primary mt-4">Thống Kê Doanh Thu</h2>
    <div class="col-6">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Doanh Thu Hôm Nay</h5>
                <p class="card-text text-primary">
                    <?php echo number_format($doanh_thu_hom_nay ?? 0, 0, ',', '.'); ?> VNĐ
                </p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Tổng Doanh Thu</h5>
                <p class="card-text text-success">
                    <?php echo number_format($doanh_thu_tong ?? 0, 0, ',', '.'); ?> VNĐ
                </p>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <h2 class="text-center mb-4">Sản Phẩm Đã Bán Trong Ngày (<?php echo $ngay; ?>)</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng Bán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($thong_ke) { ?>
                        <?php foreach ($thong_ke as $row) { ?>
                            <tr>
                                <td><?php echo $row['id_san_pham']; ?></td>
                                <td><?php echo $row['ten_san_pham']; ?></td>
                                <td><?php echo $row['so_luong_ban']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="3">Không có dữ liệu</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-4">
        <h2 class="text-center mb-4">Sản Phẩm Theo Danh Mục</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID Danh Mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Số Lượng Sản Phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($thong_ke_danh_muc) { ?>
                        <?php foreach ($thong_ke_danh_muc as $row) { ?>
                            <tr>
                                <td><?php echo $row['id_danh_muc']; ?></td>
                                <td><?php echo $row['ten_danh_muc']; ?></td>
                                <td><?php echo $row['so_luong_san_pham']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="3">Không có dữ liệu</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-4">
        <h2 class="text-center mb-4">Sản Phẩm Bán Chạy</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng Bán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($thong_ke_ban_chay) { ?>
                        <?php foreach ($thong_ke_ban_chay as $row) { ?>
                            <tr>
                                <td><?php echo $row['id_san_pham']; ?></td>
                                <td><?php echo $row['ten_san_pham']; ?></td>
                                <td><?php echo $row['so_luong_ban']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="3">Không có dữ liệu</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                        