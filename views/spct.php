<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <?php if ($sanpham): ?>
            <h1 class="text-3xl font-bold mb-4"><?= $sanpham['ten_san_pham']; ?></h1>
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2">
                    <img src="images/<?= $sanpham['hinh']; ?>" alt="<?= $sanpham['ten_san_pham']; ?>" class="w-full h-auto object-cover rounded-lg">
                </div>
                <div class="lg:w-1/2 lg:pl-10 mt-6 lg:mt-0">
                    <p class="text-gray-700 text-lg mb-4"><strong>Mô tả:</strong> <?= $sanpham['mo_ta']; ?></p>
                    <p class="text-gray-800 text-xl font-semibold mb-2"><strong>Giá:</strong> <?= number_format($sanpham['gia']); ?>USD</p>
                    <form action="index.php?act=themgiohang" method="post">
                        <input type="hidden" name="id_san_pham" value="<?= $sanpham['id_san_pham']; ?>">
                        <input type="hidden" name="ten_san_pham" value="<?= $sanpham['ten_san_pham']; ?>">
                        <input type="hidden" name="hinh" value="<?= $sanpham['hinh']; ?>">
                        <input type="hidden" name="gia" value="<?= $sanpham['gia']; ?>">
                        <input type="number" name="soluong" value="1" class="btn btn-outline-secondary mb-2">
                        <br>
                        <input type="submit" name="themgiohang" class="btn btn-primary" value="Thêm vào giỏ hàng">
                    </form>

                </div>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Sản phẩm không tồn tại.</p>
        <?php endif; ?>
    </div>
</body>

</html>