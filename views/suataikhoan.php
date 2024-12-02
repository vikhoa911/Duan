<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Chỉnh sửa tài khoản</h4>
                </div>

                <div class="card-body">
                    <form action="index.php?act=suataikhoan" method="POST">
                        <input type="hidden" name="id_tai_khoan" value="<?php echo htmlspecialchars($tai_khoan['id_tai_khoan']); ?>">

                        <div class="form-group">
                            <label for="ten_dang_nhap">Tên đăng nhập:</label>
                            <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" class="form-control"
                                value="<?php echo htmlspecialchars($tai_khoan['ten_dang_nhap']); ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="mat_khau">Mật khẩu:</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control"
                                value="<?php echo htmlspecialchars($tai_khoan['mat_khau']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="<?php echo htmlspecialchars($tai_khoan['email']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="dia_chi">Địa chỉ:</label>
                            <textarea name="dia_chi" id="dia_chi" class="form-control" required><?php echo htmlspecialchars($tai_khoan['dia_chi']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="so_dien_thoai">Số điện thoại:</label>
                            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control"
                                value="<?php echo htmlspecialchars($tai_khoan['so_dien_thoai']); ?>" required>
                        </div>

                        <button type="submit" name="capnhat" class="btn btn-primary mt-3">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>