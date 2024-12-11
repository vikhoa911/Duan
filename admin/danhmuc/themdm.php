<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="text-primary">THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="mb-4 text-end">
        <a href="index.php?act=hienthidm" class="btn btn-info">DANH SÁCH</a>
    </div>
    <form action="index.php?act=themdm" method="post" class="border p-4 rounded shadow-sm bg-light">
        <!-- <div class="mb-3">
            <label for="maloai" class="form-label">Mã loại</label>
            <input type="text" id="maloai" name="maloai" class="form-control" placeholder="Tự động tạo" disabled>
        </div> -->
        <div class="mb-3">
            <label for="ten_danh_muc" class="form-label">Tên loại</label>
            <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>
        <div class="d-flex gap-2">
            <input type="submit" name="themmoi" class="btn btn-primary"></input>
            <button type="reset" class="btn btn-secondary">NHẬP LẠI</button>
        </div>
        <?php 
        if (isset($thongbao) && ($thongbao != '')) {
            echo '<div class="alert alert-info mt-3">' . $thongbao . '</div>';
        }
        ?>
    </form>
</div>
