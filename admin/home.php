
<div class="row">
            <div class="row formtitle">
                <h1>THÊM MỚI LOẠI DANH MỤC</h1>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=themdm" method="post">
                <div class="row mb10"> 
                    Mã loại <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row mb10">
                    Tên loại <br>
                    <input type="text" name="ten_danh_muc">
                </div>
                <div class="row mb10">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=hienthidm"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php 
                    if(isset($thongbao)&&($thongbao!='')) echo $thongbao;
                ?>
                </form>
            </div>
        </div>
    </div>