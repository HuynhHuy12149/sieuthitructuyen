<div class="row">
            <div class="row formtitle">
                <p>DANH SÁCH LOẠI HÀNG</p>
            </div>
            <div class="row formcontent">
                <form action="#" method="post">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                            <?php
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);//khi extract có thể lấy truc tiep tên cột trong sql show ra sử dụng thoải mái
                                    $suadm = "index.php?act=suadm&id=".$id;
                                    $xoadm = "index.php?act=xoadm&id=".$id;
                                    echo '<tr>
                                            <td>
                                                <input type="checkbox" name="" id="">
                                            </td>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>
                                                
                                                <a href="'.$xoadm.'"><input type="button" name="" value="xóa"></a>
                                            </td>
                                            <td>
                                                <a href="'.$suadm.'"><input type="button" name="" value="sửa"></a>
                                                
                                            </td>
                                         </tr>';
                                }
                            ?>
                            
                        </table>
                    </div>
                    <div class="row mb10">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa các mục đã chọn">
                        <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                    </div>
                </form>
            </div>
        </div>