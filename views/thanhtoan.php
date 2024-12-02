<?php
if (!isset($_SESSION['ten_dang_nhap'])) {
    // Chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?act=dangnhap");
    exit();
}
$listGioHang = layDanhSachGioHang(2);  // Hàm này phải trả về một chuỗi HTML
$tongTien = tinhTongTien();           // Hàm này trả về tổng tiền
?>
<div class="container bg-gray-100 py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Thông tin đặt hàng -->
            <div>
                <?php 
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
                ?>
                <h2 class="text-xl font-semibold mb-6">Thông tin đặt hàng</h2>
                <form class="space-y-4" action="index.php?act=dat_hang" method="post">
    <!-- Full Name and Phone Number -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="ten_dang_nhap" class="block text-sm font-medium text-gray-700">Họ và tên:</label>
            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="<?= htmlspecialchars($ten_dang_nhap); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required />
        </div>
        <div>
            <label for="so_dien_thoai" class="block text-sm font-medium text-gray-700">Số điện thoại:</label>
            <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?= htmlspecialchars($so_dien_thoai); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required />
        </div>
    </div>
    <!-- Address -->
    <div>
        <label for="dia_chi" class="block text-sm font-medium text-gray-700">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi" value="<?= htmlspecialchars($dia_chi); ?>" placeholder="Địa chỉ nhận hàng" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required />
    </div>
    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email); ?>" placeholder="Email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required />
    </div>
    <!-- Payment Method -->
    <div>
        <label for="thanh_toan_don_hang" class="block text-sm font-medium text-gray-700">Phương thức thanh toán:</label>
        <select id="thanh_toan_don_hang" name="thanh_toan_don_hang" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required>
            <option value="1">Thanh toán khi nhận hàng</option>
            <option value="2">Chuyển khoản</option>
            <option value="3">Thanh toán Online</option>
        </select>
    </div>
    <!-- Additional Notes -->
    <div>
        <label for="additional-info" class="block text-sm font-medium text-gray-700">Ghi chú:</label>
        <textarea id="additional-info" name="ghi_chu" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"></textarea>
    </div>
    <!-- Submit Button -->
    <button type="submit" name="dongydathang" value="1" class="w-full mt-6 py-2 px-4 bg-gray-900 text-white rounded-lg shadow hover:bg-black">Đặt hàng</button>
</form>

            </div>

            <!-- Chi tiết đơn hàng -->
            <div>
                <h2 class="text-xl font-semibold mb-6">Sản phẩm</h2>
                <div class="bg-white p-6 shadow rounded-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 ps-5">Sản phẩm</th>
                                <th class="py-2 ps-3">Đơn giá</th>
                                <th class="py-2 ps-2">Số lượng</th>
                                <th class="py-2">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Hiển thị các mục giỏ hàng -->
                            <?php echo $listGioHang; ?>  <!-- Hiển thị chuỗi HTML từ hàm layDanhSachGioHang() -->
                        </tbody>
                    </table>

                    <hr class="my-4" />
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Tổng cộng</span>
                        <span class="text-lg font-bold"><?= number_format($tongTien, 0, ',', '.'); ?> VND</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
