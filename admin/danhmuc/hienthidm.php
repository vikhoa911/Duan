<div class="row">
    <div class="row formcontent text-center">
        <h1>DANH SÁCH HÀNG HÓA</h1>
    <div class="row formcontent  text-center">
        <div class="row mb-3 formloai">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($listdanh_muc as $danhmuc) {
                            extract($danhmuc);
                            $suadm = "index.php?act=suadm&id=" . $id_danh_muc;
                            $xoadm = "index.php?act=xoadm&id=" . $id_danh_muc;
                            echo '  
                        <tr>
                            <td>' . $id_danh_muc . '</td>
                            <td>' . $ten_danh_muc . '</td>
                            <td>
                                <a href="' . $suadm . '" class="btn btn-warning btn-sm">Sửa</a> 
                                <a href="' . $xoadm . '" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                        ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mb-3 text-end">
            <a href="index.php?act=themdm" class="btn btn-primary">Nhập thêm</a>
        </div>
    </div>
</div>

</div>