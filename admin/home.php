<div class="row">
    <div class="row formcontent text-center mb-4">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    
    <div class="row formcontent container">
        
    <a href="index.php?act=hienthidm" class="btn btn-info">DANH SÁCH</a>
        <form action="index.php?act=themdm" method="post">
            <div class="row mb-3"> 
                <label for="maloai" class="form-label">Mã loại</label>
                <input type="text" id="maloai" name="maloai" class="form-control" disabled>
            </div>
            <div class="row mb-3">
                <label for="ten_danh_muc" class="form-label">Tên loại</label>
                <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control">
            </div>
            <div class="row mb-3 d-flex gap-2">
                <input type="submit" name="themmoi" value="THÊM MỚI" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <br>
                <hr>

            </div>
            <?php 
                if(isset($thongbao)&&($thongbao!='')) echo '<div class="alert alert-info">' . $thongbao . '</div>';
            ?>
        </form>
    </div>
</div></div>
