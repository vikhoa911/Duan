<?php
$img_path = "images/"; // Đường dẫn chứa ảnh

// Giả sử các hàm cần thiết đã được định nghĩa
$listGioHang = layDanhSachGioHang(2); // Lấy danh sách giỏ hàng
$tongTien = tinhTongTien(); // Tính tổng tiền giỏ hàng

// Kiểm tra thông tin người dùng từ session
if (isset($_SESSION['ten_dang_nhap'])) {
    $ten_dang_nhap = $_SESSION['ten_dang_nhap']['ten_dang_nhap'] ?? "";
    $email = $_SESSION['ten_dang_nhap']['email'] ?? "";
    $dia_chi = $_SESSION['ten_dang_nhap']['dia_chi'] ?? "";
    $so_dien_thoai = $_SESSION['ten_dang_nhap']['so_dien_thoai'] ?? "";
} else {
    $ten_dang_nhap = "";
    $email = "";
    $dia_chi = "";
    $so_dien_thoai = "";
}

// Thông tin đơn hàng (giả định đã được truyền vào từ quá trình xử lý đặt hàng)
$don_hang = [
    'ten_don_hang' => $ten_dang_nhap,
    'dia_chi_don_hang' => $dia_chi,
    'email_don_hang' => $email,
    'so_dien_thoai_don_hang' => $so_dien_thoai,
    'ngay_dat_hang' => date('d-m-Y') // Ngày hiện tại
];
?>
<div class="container bg-gray-100 py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Phần cảm ơn và thông tin đơn hàng -->
            <div>
                <h2 class="text-2xl font-bold text-center">Cảm ơn quý khách đã đặt hàng!</h2>
                <div class="don_hang mt-6">
                    <h3 class="text-xl font-semibold">Thông tin đơn hàng:</h3>
                    <p>Tên khách hàng: <?= htmlspecialchars($don_hang['ten_don_hang']); ?></p>
                    <p>Địa chỉ: <?= htmlspecialchars($don_hang['dia_chi_don_hang']); ?></p>
                    <p>Email: <?= htmlspecialchars($don_hang['email_don_hang']); ?></p>
                    <p>Số điện thoại: <?= htmlspecialchars($don_hang['so_dien_thoai_don_hang']); ?></p>
                    <p>Ngày đặt: <?= htmlspecialchars($don_hang['ngay_dat_hang']); ?></p>
                </div>
            </div>

            <!-- Phần chi tiết giỏ hàng -->
            <div>
                <h3 class="mt-6 text-xl font-semibold">Chi tiết giỏ hàng:</h3>
                <div class="bg-white p-6 shadow rounded-lg">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Sản phẩm</th>
                                <th class="border border-gray-300 px-4 py-2">Hình ảnh</th>
                                <th class="border border-gray-300 px-4 py-2">Số lượng</th>
                                <th class="border border-gray-300 px-4 py-2">Đơn giá</th>
                                <th class="border border-gray-300 px-4 py-2">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['mycart'] as $cart): ?>
                                <?php $hinh_full_path = $img_path . htmlspecialchars($cart[2]); ?>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($cart[1]); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img src="<?= $hinh_full_path ?>" alt="Hình sản phẩm" width="50" class="img-thumbnail">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($cart[4]); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= number_format($cart[3], 0, ',', '.'); ?> đ</td>
                                    <td class="border border-gray-300 px-4 py-2"><?= number_format($cart[3] * $cart[4], 0, ',', '.'); ?> đ</td>
                                </tr>
                            <?php endforeach;
                            $_SESSION['mycart'] = [];
                             ?>
                        </tbody>
                    </table>
                    <hr class="my-4">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Tổng cộng</span>
                        <span class="text-lg font-bold text-yellow-500"><?= number_format($tongTien, 0, ',', '.'); ?> VND</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
