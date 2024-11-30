<div class="row">
    <div class="row formtitle mb-4">
        <h1 class="text-center">DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row formcontent container">
        <div class="row mb-3 formcontent">
            <table class="table table-bordered table-striped text-center align-middle">
                <tr>
                    <th>ID BÌNH LUẬN</th>
                    <th>NỘI DUNG</th>
                    <th>ID NGƯỜI DÙNG</th>
                    <th>ID SẢN PHẨM</th>
                    <th>ĐÁNH GIÁ</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>
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
                        
                        <a href="' . $xoabl . '"><input type="button" class="btn btn-danger btn-sm" value="Xóa"></a>
                    </td>
                </tr>
                ';
                }
                ?>
            </table>
        </div>
    </div>
</div>
