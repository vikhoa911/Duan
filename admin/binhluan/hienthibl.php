<div class="container mt-5">
    <!-- Tiêu đề danh sách bình luận -->
    <div class="row mb-4">
        <h1 class="text-center text-primary">DANH SÁCH BÌNH LUẬN</h1>
    </div>

    <!-- Nội dung bảng danh sách bình luận -->
    <div class="row container mt-5">
        <div class="col-12">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="thead-dark">
                    <tr>
                        <th>ID BÌNH LUẬN</th>
                        <th>NỘI DUNG</th>
                        <th>ID NGƯỜI DÙNG</th>
                        <th>ID SẢN PHẨM</th>
                        <th>ĐÁNH GIÁ</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $xoabl = "index.php?act=xoabl&id_binh_luan=" . $id_binh_luan;
                        echo '
                    <tr>
                        <td>' . $id_binh_luan . '</td>
                        <td>' . $noi_dung . '</td>
                        <td>' . $id_tai_khoan . '</td>
                        <td>' . $id_san_pham . '</td>
                        <td>' . $danh_gia . '</td>
                        <td>' . $thoi_gian . '</td>
                        <td>
                            <a href="' . $xoabl . '" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
