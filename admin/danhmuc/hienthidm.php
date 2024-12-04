<div class="row">
<div class="row mb-4">
        <h1 class="text-center text-primary mt-4">DANH SÁCH DANH MỤC</h1>
        <div class="row ms-2 mb-3 text-end">
            <a href="index.php?act=themdm" class="btn btn-primary">Nhập thêm</a>
        </div>
    <div class="row container  text-center">
        <div class="ms-4 container">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
    </div>
</div>

</div>