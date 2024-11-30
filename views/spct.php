<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6 mb-4">
        <?php if ($sanpham): ?>
            <h1 class="text-3xl font-bold mb-4"><?= $sanpham['ten_san_pham']; ?></h1>
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2">
                    <img src="images/<?= $sanpham['hinh']; ?>" alt="<?= $sanpham['ten_san_pham']; ?>" class="w-full h-auto object-cover rounded-lg">
                </div>
                <div class="lg:w-1/2 lg:pl-10 mt-6 lg:mt-0">
                    <p class="text-gray-700 text-lg mb-4"><strong>Mô tả:</strong> <?= $sanpham['mo_ta']; ?></p>
                    <p class="text-gray-800 text-xl font-semibold"><strong>Giá:</strong> <?= number_format($sanpham['gia']); ?>₫</p>
                    <button class="bg-blue-600 text-white px-4 py-2 mt-6 rounded-lg">Thêm vào giỏ hàng</button>
                </div>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Sản phẩm không tồn tại.</p>
        <?php endif; ?>
    </div>
</body>
</html>
