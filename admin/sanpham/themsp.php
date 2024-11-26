<div class="row">
    <div class="row formtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=themsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                DANH MỤC SẢN PHẨM<br>
                <select name="id_danh_muc" required>
    <option value="">--Chọn danh mục--</option>
    <?php foreach ($listdanh_muc as $dm): ?>
        <option value="<?= $dm['id_danh_muc'] ?>"><?= $dm['ten_danh_muc'] ?></option>
    <?php endforeach; ?>
</select>

            </div>
            <div class="row mb10">
                Tên sản phẩm <br>
                <input type="text" name="ten_san_pham">
            </div>
            <div class="row mb10">
                Giá <br>
                <input type="text" name="gia">
            </div>
            <div class="row mb10">
                Hình<br>
                <input type="file" name="hinh">
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="mo_ta" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=hienthi"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php 
            if (isset($thongbao) && ($thongbao != '')) echo $thongbao;
            ?>
        </form>
    </div>
</div>
