<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-6">THÊM MỚI SẢN PHẨM</h1>
    </div>
    <form action="index.php?act=themsp" method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="id_danh_muc" class="form-label">DANH MỤC SẢN PHẨM</label>
            <select name="id_danh_muc" id="id_danh_muc" class="form-select" required>
                <option value="" disabled selected>--Chọn danh mục--</option>
                <?php foreach ($listdanh_muc as $dm): ?>
                    <option value="<?= $dm['id_danh_muc'] ?>"><?= $dm['ten_danh_muc'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ten_san_pham" class="form-label">TÊN SẢN PHẨM</label>
            <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">GIÁ</label>
            <input type="number" name="gia" id="gia" class="form-control" placeholder="Nhập giá sản phẩm" required>
        </div>
        <div class="mb-3">
            <label for="hinh" class="form-label">HÌNH ẢNH</label>
            <input type="file" name="hinh" id="hinh" class="form-control">
        </div>
        <div class="mb-3">
            <label for="mo_ta" class="form-label">MÔ TẢ</label>
            <textarea name="mo_ta" id="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
        </div>
        <div class="d-flex gap-2">
            
        <input type="submit" name="themmoi" class="btn btn-primary" value="THÊM MỚI">
            <button type="reset" class="btn btn-secondary">NHẬP LẠI</button>
            <a href="index.php?act=hienthisp" class="btn btn-info">DANH SÁCH</a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != '')): ?>
            <div class="alert alert-info mt-3"><?= $thongbao ?></div>
        <?php endif; ?>
    </form>
</div>
