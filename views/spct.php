<?php
include_once 'models/sanpham.php';
$img_path = "images/";

// Giả sử $sanpham chứa thông tin sản phẩm hiện tại
// Bạn cần đảm bảo $sanpham được truyền từ controller trước khi hiển thị
$id_danh_muc = $sanpham['id_danh_muc'];
$id_san_pham_hien_tai = $sanpham['id_san_pham']; // Lưu ID của sản phẩm hiện tại

// Lấy danh sách sản phẩm thuộc cùng danh mục
$products = loadall_san_pham("", $id_danh_muc);
?>

<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <?php if ($sanpham): ?>
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2">
                    <img src="images/<?= $sanpham['hinh']; ?>" alt="<?= $sanpham['ten_san_pham']; ?>" class="w-full h-auto object-cover rounded-lg">
                </div>
                <div class="lg:w-1/2 lg:pl-10 mt-6 lg:mt-0">
                    <h1 class="text-3xl font-bold mb-4">Tên sản phẩm: <?= $sanpham['ten_san_pham']; ?></h1>
                    <p class="text-gray-800 text-xl font-semibold mb-3 mt-3"><strong>Giá:</strong> <?= number_format($sanpham['gia']); ?>VNĐ</p>
                    <form action="index.php?act=themgiohang" method="post">
                        <input type="hidden" name="id_san_pham" value="<?= $sanpham['id_san_pham']; ?>">
                        <input type="hidden" name="ten_san_pham" value="<?= $sanpham['ten_san_pham']; ?>">
                        <input type="hidden" name="hinh" value="<?= $sanpham['hinh']; ?>">
                        <input type="hidden" name="gia" value="<?= $sanpham['gia']; ?>">
                        <input type="number" name="soluong" value="1" class="btn btn-outline-secondary mb-2">
                        <br>
                        <input type="submit" name="themgiohang" class="btn btn-primary mb-3 mt-3" value="Thêm vào giỏ hàng">
                    </form>
                    <p class="text-gray-700 text-lg mb-3 mt-3"><strong>Mô tả:</strong> <?= $sanpham['mo_ta']; ?></p>
                </div>
            </div>
            <div class="mt-6">
                <h2 class="text-2xl font-bold mb-4">Sản phẩm liên quan</h2>
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <?php
                            // Bỏ qua sản phẩm hiện tại
                            if ($product['id_san_pham'] == $id_san_pham_hien_tai) {
                                continue;
                            }
                            // Tạo đường dẫn hình ảnh và link sản phẩm
                            $hinh_full_path = $img_path . htmlspecialchars($product['hinh']);
                            $linksp = "index.php?act=chitietsp&id_san_pham=" . htmlspecialchars($product['id_san_pham']);
                            ?>
                            <div class="group bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                                <a href="<?= $linksp ?>" class="block">
                                    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-200 overflow-hidden">
                                        <img src="<?= $hinh_full_path ?>" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>" class="object-cover w-full h-full group-hover:opacity-90 transition duration-300">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 truncate"><?= htmlspecialchars($product['ten_san_pham']) ?></h3>
                                        <p class="text-red-500 font-bold mt-1">Giá: <?= htmlspecialchars(number_format($product['gia'])) ?> VNĐ</p>
                                    </div>
                                </a>
                                <div class="p-4 flex justify-center">
                                    <a href="<?= $linksp ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Xem Chi Tiết</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Không có sản phẩm nào!</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Sản phẩm không tồn tại.</p>
        <?php endif; ?>
    </div>
</body>

</html>