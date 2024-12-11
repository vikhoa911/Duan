<div class="row">
    <div class="row mb-4">
        <h1 class="text-center text-primary mt-4">DANH SÁCH LOẠI HÀNG</h1>
        <div class="row ms-2 mb-3 text-end">
            <div class="container">
                <?php
                if (isset($thongbao) && ($thongbao != '')) {
                    echo '<div class="alert alert-success mt-3 text-center">' . $thongbao . '</div>';
                }
                ?>
            </div>
            <a href="index.php?act=themdm" class="btn btn-primary">Nhập thêm</a>
        </div>
        <div class="row container text-center">
            <div class="ms-4 container">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
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
                                <td>' . $ten_danh_muc . '</td>
                                <td>
                                    <a href="' . $suadm . '" class="btn btn-warning btn-sm">Sửa</a> 
                                    <a href="' . $xoadm . '" class="btn btn-danger btn-sm m-3" onclick="return confirm(\'Bạn có chắc chắn muốn xóa danh mục này không?\')">Xóa</a>
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
