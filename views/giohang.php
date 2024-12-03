<?php
$listGioHang = layDanhSachGioHang(1);
$tongTien = tinhTongTien();
?>

<div class="container mx-auto px-4 py-6">
    <!-- Cart Table -->
    <div class="overflow-hidden border rounded-lg shadow-sm bg-light">
        <table class="w-full text-left border-collapse">
            <?php echo $listGioHang; // Hiển thị danh sách giỏ hàng 
            ?>
        </table>
    </div>

    <!-- Cart Totals -->
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div></div>
        <div class="border rounded-lg bg-light p-6 shadow-sm">
            <h2 class="text-xl font-bold mb-4">Tổng đơn hàng</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="font-bold">Tổng tiền</span>
                    <span class="total-price text-lg font-bold"><?php echo number_format($tongTien, 0, ',', '.'); ?> VND</span>
                </div>
                <a href="index.php?act=thanhtoan">
                    <input class="w-full mt-4 bg-black text-white py-3 rounded-lg hover:bg-gray-800" type="button" value="TIẾP TỤC ĐẶT HÀNG">
                </a>
            </div>
        </div>
    </div>
</div>