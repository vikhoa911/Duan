<?php 
if(is_array($dm)){
    extract($dm);
}
?>
<div class="row">
            <div class="row formtitle">
                <h1>CẬP NHẬT HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                <div class="row mb10"> 
                    Mã loại <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row mb10">
                    Tên loại <br>
                    <input type="text" name="ten_danh_muc" value="<?php if(isset($ten_danh_muc)&&$ten_danh_muc!="") echo $ten_danh_muc?>">
                </div>
                <div class="row mb10">
                    Mô tả <br>
                    <textarea name="mo_ta"><?php if(isset($mo_ta) && $mo_ta != "") echo $mo_ta; ?></textarea>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value ="<?php if(isset($id)&&$id>0) echo $id?>">
                    <input type="submit" name="capnhat" value="Cập nhât">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=hienthidm"><input type="button" value="DANH SÁCH"></a>
                </div>
                </form>
            </div>
        </div>
    </div>