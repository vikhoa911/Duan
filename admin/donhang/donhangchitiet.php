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
</div>