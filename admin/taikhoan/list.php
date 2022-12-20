<div class="row">
            <div class="row formtitle">
                <p>DANH SÁCH TÀI KHOẢN</p>
            </div>
            <div class="row formcontent">
                <form action="#" method="post">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã tài khoản</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                            <?php
                                foreach($listtaikhoan as $taikhoan){
                                    extract($taikhoan);//khi extract có thể lấy truc tiep tên cột trong sql show ra sử dụng thoải mái
                                    $suatk = "index.php?act=suatk&id=".$idtk;
                                    $xoatk = "index.php?act=xoatk&id=".$idtk;
                                    echo '<tr>
                                            <td>
                                                <input type="checkbox" name="" id="">
                                            </td>
                                            <td>'.$idtk.'</td>
                                            <td>'.$user.'</td>
                                            <td>'.$pass.'</td>
                                            <td>'.$fullname.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$address.'</td>
                                            <td>'.$tel.'</td>
                                            <td>'.$role.'</td>
                                            <td>
                                                
                                                <a href="'.$xoatk.'"><input type="button" name="" value="xóa"></a>
                                            </td>
                                            <td>
                                                <a href="'.$suatk.'"><input type="button" name="" value="sửa"></a>
                                               
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
                        <a href="index.php?act=addtk"><input type="button" value="Nhập thêm" ></a>
                    </div>
                </form>
            </div>
        </div>