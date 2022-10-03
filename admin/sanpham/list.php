<div class="row">
            <div class="row formtitle mb10">
                <p>DANH SÁCH LOẠI HÀNG</p>
            </div>
            <form action="index.php?act=listsp" method="post">
                <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="formloc" name="keyw">
                <select name="iddm" style="border:1px #ccc solid;padding:5px;">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>                 
                </select>
                <input type="submit" name="loc" class="formloc filter" value="Thực hiện">
            </form>
            <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã hàng hóa</th>
                                <th>Tên hàng hóa</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Lượt Xem</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach($listsanpham as $sanpham){
                                    extract($sanpham);//khi extract có thể lấy truc tiep tên cột trong sql show ra sử dụng thoải mái
                                    $suasp = "index.php?act=suasp&id=".$idsp;
                                    $xoasp = "index.php?act=xoasp&id=".$idsp;
                                    $imgpath="../upload/".$img;

                                    //kiem tra duong dẫn hình có tồn tại k
                                    if(is_file($imgpath)){
                                        $hinh = "<img src='".$imgpath."' height='80'>";
                                    }else{
                                        $hinh = "no photo";
                                    }
                                    echo '<tr>
                                            <td>
                                                <input type="checkbox" name="" id="">
                                            </td>
                                            <td>'.$idsp.'</td>
                                            <td>'.$namesp.'</td>
                                            <td>'.$hinh.'</td>
                                            <td>'.$price.'</td>
                                            <td>'.$luotxem.'</td>
                                            <td>
                                                <a href="'.$suasp.'"><input type="button" name="" value="sửa"></a>
                                                <a href="'.$xoasp.'"><input type="button" name="" value="xóa"></a>
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
                        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                    </div>
            </div>
        </div>