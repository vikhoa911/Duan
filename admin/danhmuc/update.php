<?php 
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="container mt-5">
    <div class="row formcontent text-center mb-4">
        <h1 class="text-primary">CẬP NHẬT LOẠI HÀNG HÓA</h1>
        <a href="index.php?act=hienthidm" class="btn btn-info">Danh sách</a> 
    </div>

    <!-- Form cập nhật loại hàng hóa -->
    <div class="row formcontent">
        <form action="index.php?act=updatedm" method="post" class="p-4 border rounded shadow-sm">
            <!-- <div class="row mb-3">  -->
                <!-- <label for="maloai" class="form-label">Mã loại</label> -->
                <!-- Mã loại không thể chỉnh sửa -->
                <!-- <input type="text" name="maloai" id="maloai" class="form-control" value="<?php echo isset($id_danh_muc) ? $id_danh_muc : ''; ?>" disabled> -->
            <!-- </div> -->

            <div class="row mb-3">
                <label for="ten_danh_muc" class="form-label">Tên loại</label>
                <!-- Tên loại có giá trị mặc định -->
                <input type="text" name="ten_danh_muc" id="ten_danh_muc" class="form-control" value="<?php echo isset($ten_danh_muc) ? $ten_danh_muc : ''; ?>" placeholder="Nhập tên loại hàng hóa">
            </div>

            <div class="row mb-3">
                <!-- Ẩn ID của danh mục để gửi trong form -->
                <input type="hidden" name="id_danh_muc" value="<?php echo isset($id_danh_muc) ? $id_danh_muc : ''; ?>">
                <div class="d-flex gap-2">
                    <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-success">
                    <input type="reset" value="Nhập lại" class="btn btn-secondary">
                </div>
            </div>
        </form>
    </div>

    <!-- Hiển thị thông báo -->
    <?php 
    if (isset($thongbao) && $thongbao != '') {
        echo '<div class="alert alert-info">' . $thongbao . '</div>';
    }
    ?>
</div>
