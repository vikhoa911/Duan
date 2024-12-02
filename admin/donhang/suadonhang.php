<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <!-- Tiêu đề của form cập nhật trạng thái đơn hàng -->
            <div class="row formtitle mb-4">
                <h1 class="text-center text-primary">CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG</h1>
            </div>

            <!-- Form cập nhật trạng thái đơn hàng -->
            <form action="index.php?act=updatedonhang" method="post">
                <input type="hidden" name="id_don_hang" value="<?= htmlspecialchars($don_hang['id_don_hang']) ?>">

                <!-- Tình trạng đơn hàng -->
                <div class="mb-4">
                    <label for="trang_thai_don_hang" class="form-label">Tình trạng đơn hàng:</label>
                    <select name="trang_thai_don_hang" id="don_hang_status" class="form-select">
                        <option value="0" <?= $don_hang['trang_thai_don_hang'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                        <option value="1" <?= $don_hang['trang_thai_don_hang'] == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                        <option value="2" <?= $don_hang['trang_thai_don_hang'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                        <option value="3" <?= $don_hang['trang_thai_don_hang'] == 3 ? 'selected' : '' ?>>Hoàn tất</option>
                    </select>
                </div>

                <!-- Các nút thao tác -->
                <div class="mb-3">
                    <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-success me-2">
                    <input type="reset" value="Nhập lại" class="btn btn-secondary me-2">
                    <a href="index.php?act=hienthidonhang" class="btn btn-primary">Danh sách</a>
                </div>

                <!-- Hiển thị thông báo -->
                <?php if (isset($thongbao) && $thongbao != ""): ?>
                    <div class="alert alert-info">
                        <?= $thongbao ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
