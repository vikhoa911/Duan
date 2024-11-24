<div class="row">
            <div class="row formtitle">
                <h1>DANH SÁCH HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th>MÔ TẢ</th>
                            <th></th>
                        </tr>
                        
                        <?php 
                            foreach ($listdanh_muc as $danhmuc) {
                                extract($danhmuc);
                                $suadm="index.php?act=suadm&id=".$id_danh_muc;
                                $xoadm="index.php?act=xoadm&id=".$id_danh_muc;
                                echo '  
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>'.$id_danh_muc.'</td>
                            <td>'.$ten_danh_muc.'</td>
                            <td>'.$mo_ta.'</td>
                            <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                        </tr>
                        ';
                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <a href="index.php?act=themdm"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>