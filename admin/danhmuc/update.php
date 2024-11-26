<?php 
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="row">
    <div class="row formcontent text-center mb-4">
        <h1>CẬP NHẬT HÀNG HÓA</h1>
        <a href="index.php?act=hienthidm" class="btn btn-info">Danh sách</a> 
    </div>
    <div class="row formcontent container">
        <form action="index.php?act=updatedm" method="post" class="p-4 border rounded">
            <div class="row mb-3"> 
                <label for="maloai" class="form-label">Mã loại</label>
                <input type="text" name="maloai" id="maloai" class="form-control" disabled>
            </div>
            <div class="row mb-3">
                <label for="ten_danh_muc" class="form-label">Tên loại</label>
                <input type="text" name="ten_danh_muc" id="ten_danh_muc" class="form-control" value="<?php if(isset($ten_danh_muc) && $ten_danh_muc != "") echo $ten_danh_muc; ?>">
            </div>
            <div class="row mb-3">
                <input type="hidden" name="id_danh_muc" value="<?php if(isset($id_danh_muc) && $id_danh_muc > 0) echo $id_danh_muc; ?>">
                <div class="d-flex gap-2">
                    <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-success">
                    <input type="reset" value="Nhập lại" class="btn btn-secondary">
                </div>
            </div>
        </form>
    </div>
    <?php 
    if (isset($thongbao) && $thongbao != '') {
        echo $thongbao;
    }
    ?>
</div>
