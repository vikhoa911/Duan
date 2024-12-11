<?php 
if(is_array($taikhoan)){
    extract($taikhoan);
}
?>
<div class="row">
    <div class="row formtitle mb-4">
        <h1 class="text-center text-primary">CẬP NHẬT TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent formcontent1 container ">
        <form action="index.php?act=updatetk" method="post" class="container">
            <div class="row mb-3">
                Tên đăng nhập <br>
                <input type="text" name="user" class="form-control" value="<?php if (isset($ten_dang_nhap) && $ten_dang_nhap != "") echo $ten_dang_nhap; ?>" disabled> 
            </div>
            <div class="row mb-3">
                Mật khẩu <br>
                <input type="password" name="pass" class="form-control" value="<?php if(isset($mat_khau) && $mat_khau!="") echo $mat_khau; ?>" disabled>
            </div>
            <div class="row mb-3">
                Email <br>
                <input type="email" name="email" class="form-control" value="<?php if(isset($email) && $email!="") echo $email; ?>">
            </div>
            <div class="row mb-3">
                Địa chỉ <br>
                <input type="text" name="address" class="form-control" value="<?php if(isset($dia_chi) && $dia_chi!="") echo $dia_chi; ?>">  <!-- Cập nhật địa chỉ -->
            </div>
            <div class="row mb-3">
                Số điện thoại <br>
                <input type="text" name="tel" class="form-control" value="<?php if(isset($so_dien_thoai) && $so_dien_thoai!="") echo $so_dien_thoai; ?>">  <!-- Cập nhật số điện thoại -->
            </div>
            <div class="row mb-3">
    Vai trò <br>
    <select name="vai_tro" class="form-control">
        <option value="1" <?php if(isset($vai_tro) && $vai_tro == 1) echo 'selected'; ?>>Admin</option>
        <option value="0" <?php if(isset($vai_tro) && $vai_tro == 0) echo 'selected'; ?>>User</option>
    </select>
</div>

            <div class="row mb-3">
                <input type="hidden" name="user" value="<?php if (isset($ten_dang_nhap) && $ten_dang_nhap != "") echo $ten_dang_nhap; ?>"> 
                <input type="hidden" name="pass" value="<?php if(isset($mat_khau) && $mat_khau!="") echo $mat_khau; ?>">  
                <input type="hidden" name="id_tai_khoan" value="<?php if(isset($id_tai_khoan) && $id_tai_khoan>0) echo $id_tai_khoan; ?>">  <!-- Cập nhật id_tai_khoan -->
                <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật">
                <input type="reset" class="btn btn-secondary" value="Nhập lại">
                <a href="index.php?act=hienthitk"><input type="button" class="btn btn-info" value="Danh sách"></a>
            </div>
        </form>
    </div>
</div>
