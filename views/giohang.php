

    
<div class="container">
    <div class="container mx-auto px-4 py-6">
        <!-- Cart Table -->
        <div class="overflow-hidden border rounded-lg shadow-sm bg-beige-100">
          <table class="w-full text-left border-collapse">
            <thead class="bg-beige-200 text-sm font-medium text-gray-700">
              <tr>
                <th class="px-6 py-3">Sản Phẩm</th>
                <th class="px-6 py-3">Giá</th>
                <th class="px-6 py-3">Số Lượng</th>
                <th class="px-6 py-3">Thành Tiền</th>
                <th class="px-6 py-3"></th>
              </tr>
            </thead>

            <?php
$tong = 0;
foreach ($_SESSION['mycart'] as $cart) {
    $img_path = "images/";
    $hinh_full_path = $img_path . $cart[2]; // Assuming $cart[2] contains the image name
    $thanhtien = $cart[3] * $cart[4];
    $tong += $thanhtien; // Cộng dồn
    echo '<tbody class="text-sm text-gray-700">
        <tr class="border-t">
            <td class="px-6 py-4 flex items-center space-x-4">
                <img src="'.$hinh_full_path.'" alt="Product Image" class="w-16 h-16 rounded-lg">
                <span class="font-medium">'.$cart[1].'</span> <!-- Product name -->
            </td>
            <td class="px-6 py-4">'.number_format($cart[3], 0, ',', '.').'</td> <!-- Product price -->
            <td class="px-6 py-4">
                <input type="number" name="quantity" value="'.$cart[4].'" min="1" class="w-12 text-center border rounded-md text-gray-700 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </td>
            <td class="px-6 py-4 font-medium">'.number_format($thanhtien, 0, ',', '.').'</td> <!-- Total price -->
            <td class="px-6 py-4 text-center">
                <form action="index.php?act=remove_cart" method="post">
                    <input type="hidden" name="cart_id" value="'.$cart[0].'">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    </tbody>';
}
?>



            
          </table>
        </div>
      
        <!-- Cart Totals -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div></div> <!-- Empty column for alignment -->
          <div class="border rounded-lg bg-beige-100 p-6 shadow-sm">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Tổng đơn hàng</h2>
            <div class="space-y-4">
              <div class="flex justify-between items-center">
                <span class="text-gray-900 font-bold">Tổng tiền</span>
                <span class="text-dark font-bold text-lg"><?php echo number_format($tong, 0, ',', '.'); ?> VND</span>

              </div>
              <button class="w-full mt-4 bg-black text-white font-medium py-3 rounded-lg hover:bg-gray-800">
                Đặt Hàng Ngay
            </button>
            
            </div>
          </div>
        </div>
      </div>
</div>

