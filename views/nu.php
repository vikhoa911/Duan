<main>
    <!-- Related Products Section -->
    <section class="related-products">
        <h2>Sản phẩm dành cho nam</h2>
        <div class="product-grid">
            <!-- Lấy danh sách sản phẩm thuộc danh mục có id_danh_muc = 2 -->
            <?php
    include 'models/sanpham.php';  // Bao gồm file chứa hàm loadall_san_pham
    $img_path = "images/";
    $id_danh_muc = 2;  // Thay đổi ID danh mục thành 2

    // Lấy danh sách sản phẩm thuộc danh mục có id_danh_muc = 2
    $products = loadall_san_pham("", $id_danh_muc);

    if (!empty($products)) { // Kiểm tra nếu có sản phẩm
        foreach ($products as $product) {
            extract($product);

            // Tạo đường dẫn hình ảnh
            $hinh_full_path = $img_path . $hinh;

            // Tạo link chi tiết sản phẩm
            $linksp = "index.php?act=chitietsp&id_san_pham=" . $id_san_pham;

            // Hiển thị thông tin sản phẩm
            echo '
                <div class="product-item">
                    <a href="' . $linksp . '">
                        <img src="' . $hinh_full_path . '" alt="' . htmlspecialchars($ten_san_pham) . '">
                        <h3>' . htmlspecialchars($ten_san_pham) . '</h3>
                        <p class="price">$' . number_format($gia, 2) . '</p>
                    </a>
                    <form action="index.php?act=themgiohang" method="post">
                        <input type="hidden" name="id_san_pham" value="' . $id_san_pham . '">
                        <input type="hidden" name="ten_san_pham" value="' . $ten_san_pham . '">
                        <input type="hidden" name="hinh" value="' . $hinh . '">
                        <input type="hidden" name="gia" value="' . $gia . '">
                        <input type="number" name="soluong" min="1" value="1" class="btn btn-outline-secondary mb-1">
                        <input type="submit" name="themgiohang" class="btn btn-primary" value="Thêm vào giỏ hàng">
                    </form>
                </div>
            ';
        }
    } else {
        echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
    }
?>

        </div>
    </section>
    <section class="new-arrival">
        <h2>Nổi Bật</h2>
        <div class="collections">
            <div class="collection-item man">
                <h3>Thời Trang Nam</h3>
                <button><a href="index.php?act=nam">Shop Now</a></button>
            </div>
            <div class="collection-item woman">
                <h3>Thời Trang Nữ</h3>
                <button><a href="index.php?act=nu">Shop Now</a></button>
            </div>
        </div>
    </section>
</main>
