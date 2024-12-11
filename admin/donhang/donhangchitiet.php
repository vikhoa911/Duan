<?php
if (isset($_GET['id_don_hang']) && ($_GET['id_don_hang'] > 0)) {
    $id_don_hang = $_GET['id_don_hang'];
    $don_hang = loadone_don_hang($id_don_hang);  // Tải thông tin đơn hàng
    $chitiet_don_hang = loadall_chitiet_don_hang($id_don_hang);  // Tải chi tiết sản phẩm của đơn hàng
}

$img_path = "../images/"; // Thư mục chứa hình ảnh sản phẩm
?>

<div class="container mt-5">
    <!-- Tiêu đề danh sách đơn hàng -->
    <div class="row mb-4">
        <h1 class="text-center text-primary">Chi tiết đơn hàng: <?php echo $don_hang['id_don_hang']; ?></h1>
    </div>

    <!-- Thông tin khách hàng -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="text-primary">Thông tin khách hàng:</h4>
            <p><strong>Tên khách hàng:</strong> <?php echo $don_hang['ten_don_hang']; ?></p>
            <p><strong>Email:</strong> <?php echo $don_hang['email_don_hang']; ?></p>
            <p><strong>Địa chỉ:</strong> <?php echo $don_hang['dia_chi_don_hang']; ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $don_hang['so_dien_thoai_don_hang']; ?></p>
            <p><strong>Ngày đặt hàng:</strong> <?php echo $don_hang['ngay_dat_hang']; ?></p>
        </div>
    </div>

    <!-- Form cập nhật trạng thái đơn hàng -->
    <div class="row mt-4">
        <div class="col-12">
            <form action="index.php?act=updatedonhang" method="post" class="mt-3">
                <input type="hidden" name="id_don_hang" value="<?= htmlspecialchars($don_hang['id_don_hang']) ?>">

                <!-- Trạng thái đơn hàng -->
                <div class="mb-3">
                    <label for="trang_thai_don_hang" class="form-label text-primary">Tình trạng đơn hàng:</label>
                    <select name="trang_thai_don_hang" id="trang_thai_don_hang" class="form-select">
                        <option value="0" <?= $don_hang['trang_thai_don_hang'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                        <option value="1" <?= $don_hang['trang_thai_don_hang'] == 1 ? 'selected' : '' ?>>Đang chờ</option>
                        <option value="2" <?= $don_hang['trang_thai_don_hang'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                        <option value="3" <?= $don_hang['trang_thai_don_hang'] == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                    </select>
                </div>

                <!-- Nội dung bảng danh sách đơn hàng -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Mã Sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Giá Sản phẩm</th>
                                        <th scope="col">Số Lượng Sản phẩm</th>
                                        <th scope="col">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Duyệt qua các chi tiết đơn hàng
                                    foreach ($chitiet_don_hang as $item) {
                                        $hinh_full_path = $img_path . $item['hinh'];
                                        // Kiểm tra nếu hình ảnh không tồn tại, sử dụng hình ảnh mặc định
                                        if (!file_exists($hinh_full_path) || empty($item['hinh'])) {
                                            $hinh_full_path = $img_path . 'default.jpg'; // Hình ảnh mặc định
                                        }

                                        echo '<tr>';
                                        echo '<td>' . $item['id_san_pham'] . '</td>';
                                        echo '<td>' . $item['ten_san_pham'] . '</td>';
                                        echo '<td><img src="' . $hinh_full_path . '" alt="' . $item['ten_san_pham'] . '" class="img-fluid" style="max-width: 100px;"></td>';
                                        echo '<td>' . number_format($item['gia'], 0, ',', '.') . ' USD</td>';
                                        echo '<td>' . $item['so_luong'] . '</td>';
                                        echo '<td>' . number_format($item['thanhtien'], 0, ',', '.') . ' USD</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Các nút thao tác -->
                <div class="mb-3">
                    <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-success me-2">
                    <a href="index.php?act=hienthidonhang" class="btn btn-primary">Danh sách đơn hàng</a>
                </div>
            </form>
        </div>
    </div>
</div>
