<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formloai">
            <table border="1">
                <tr>
                    <th></th>
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
                    <td><input type="checkbox"></td>
                    <td>' . $id_binh_luan . '</td>
                    <td>' . $noi_dung . '</td>
                    <td>' . $id_tai_khoan . '</td>
                    <td>' . $id_san_pham . '</td>
                    <td>' . $danh_gia . '</td>
                    <td>' . $thoi_gian . '</td>
                    <td>
                        
                        <a href="' . $xoabl . '"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                ';
                }
                ?>
            </table>
        </div>
    </div>
</div>
