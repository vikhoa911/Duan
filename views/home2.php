<?php
include 'models/sanpham.php';

// Định nghĩa đường dẫn đến thư mục chứa hình ảnh
$img_path = "images/";

// Giả sử id_danh_muc của danh mục "nam" là 1
$id_danh_muc = 3;

// Lấy danh sách sản phẩm thuộc danh mục có id_danh_muc = 1
$products = loadall_san_pham("", $id_danh_muc);
?>

<div class="container">
    <!-- Header Section -->
    <div class="flex items-center justify-between w-full p-4 border">
        <div class="w-1/2">
            <img src="images/man.jpg" alt="anh1" class="w-full h-auto">
        </div>
        <div class="w-1/2 flex flex-col items-start justify-center p-4">
            <p class="text-xl font-semibold">Vask Clothes</p>
            <br>
            <p>Vask Clothes cung cấp dịch vụ với giá cả tối đa ưu đãi, được đóng gói một cách cẩn thận trong chất Nền biểu tượng của thương hiệu.</p>
        </div>
    </div>

    <!-- Flash Sales Section -->
    <div class="flash-sales">
    <h2 style="font-size: 30px; font-weight: bolder;">Flash sale</h2>
    <br>
    <hr>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <?php
                // Tạo đường dẫn hình ảnh và link sản phẩm
                $hinh_full_path = $img_path . htmlspecialchars($product['hinh']);
                $linksp = "index.php?act=chitietsp&id_san_pham=" . htmlspecialchars($product['id_san_pham']);
                ?>
                <div class="product-item card text-center">
                    <a href="<?= $linksp ?>">
                        <img class="card-img-top" src="<?= $hinh_full_path ?>" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($product['ten_san_pham']) ?></h4>
                        <p class="price"><?= number_format($product['gia'], 0) ?> USD</p>
                        <form action="index.php?act=themgiohang" method="post" class="mt-3">
                            <input type="hidden" name="id_san_pham" value="<?= $product['id_san_pham'] ?>">
                            <input type="hidden" name="ten_san_pham" value="<?= htmlspecialchars($product['ten_san_pham']) ?>">
                            <input type="hidden" name="hinh" value="<?= htmlspecialchars($product['hinh']) ?>">
                            <input type="hidden" name="gia" value="<?= $product['gia'] ?>">
                            <input type="hidden" id="soluong" name="soluong" value="1">
                            <input type="submit" name="themgiohang" class="btn btn-primary btn-block" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào!</p>
        <?php endif; ?>
    </div>
</div>

    <!-- New Arrival Section -->
    <div class="new-arrival">
        <h2>New Arrival</h2>
        <div class="grid grid-cols-2 gap-4 h-screen">
            <!-- Cột lớn bên trái -->
            <div class="col-span-1 relative flex items-center justify-center">
                <img src="images/shopnam.jpg" alt="Man's Collection" class="absolute inset-0 w-full h-full object-cover">
                <div class="relative text-center bg-black bg-opacity-50 p-4 rounded">
                    <h2 class="text-2xl font-bold text-white">Man's Collection</h2>
                    <button class="mt-2 px-4 py-2 bg-white text-black rounded"><a href="index.php?act=nam">Shop Now</a></button>
                </div>
            </div>
            <!-- Ba cột nhỏ bên phải -->
            <div class="grid grid-rows-2 gap-4">
                <!-- Hàng lớn -->
                <div class="col-span-1 relative flex items-center justify-center">
                    <img src="images/shopnu.png" alt="Man's Collection" class="absolute inset-0 w-full h-full object-cover">
                    <div class="relative text-center bg-black bg-opacity-50 p-4 rounded">
                        <h2 class="text-2xl font-bold text-white">Women's Collection</h2>
                        <button class="mt-2 px-4 py-2 bg-white text-black rounded"><a href="index.php?act=nu">Shop Now</a></button>
                    </div>
                </div>
                <!-- Hai hàng nhỏ -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1 relative flex items-center justify-center">
                        <img src="images/itemnam.jpg" alt="Man's Collection" class="w-full h-full object-cover">

                    </div>
                    <div class="col-span-1 relative flex items-center justify-center">
                        <img src="images/itemnu.jpg" alt="Man's Collection" class="w-full h-full object-cover">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>