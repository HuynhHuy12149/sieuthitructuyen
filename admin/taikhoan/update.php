<?php
    if(is_array($tk)){
        extract($tk);
    }
?>
<div class="row">
            <div class="row formtitle">
                <p>CẬP NHẬT TÀI KHOẢN</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatetk" method="post">
                    <div class="row mb10">
                        <p>Mã Tài Khoản</p>
                        <input type="text" value="<?php if(isset($idtk)&&($idtk > 0)) echo $idtk;?>" name="maloai" style="background-color: #EEE;" disabled>
                    </div>
                    <div class="row mb10">
                        <p>Username</p>
                        <input type="text" value="<?php if(isset($user)&&($user!="")) echo $user;?>" name="user" id="">
                    </div>
                    <div class="row mb10">
                        <p>Password</p>
                        <input type="text" value="<?php if(isset($pass)&&($pass!="")) echo $pass;?>" name="pass" id="">
                    </div>
                    <div class="row mb10">
                        <p>FullName</p>
                        <input type="text" value="<?php if(isset($fullname)&&($fullname!="")) echo $fullname;?>" name="fullname" id="">
                    </div>
                    <div class="row mb10">
                        <p>Email</p>
                        <input type="text" value="<?php if(isset($email)&&($email!="")) echo $email;?>" name="email" id="">
                    </div>
                    <div class="row mb10">
                        <p>Địa Chỉ</p>
                        <input type="text" value="<?php if(isset($address)&&($address!="")) echo $address;?>" name="address" id="">
                    </div>
                    <div class="row mb10">
                        <p>Số Điện Thoại</p>
                        <input type="text" value="<?php if(isset($tel)&&($tel!="")) echo $tel;?>" name="tel" id="">
                    </div>
                    <div class="row mb10">
                        <p>Loại Tài Khoản</p>
                        <select name="role" id="">
                            <?php
                            if(isset($role)&&($role!="")&&$role  == 1){  
                            ?>
                                <option value="0"  ><?php if(isset($role)&&($role!="")) echo "Khách Hàng"?></option>
                                <option value="1" selected ><?php if(isset($role)&&($role!="")) echo "Admin"?></option>
                            <?php
                                }
                            ?>
                            <?php
                            if(isset($role)&&($role!="")&&$role  == 0){  
                            ?>
                                <option value="0" selected ><?php if(isset($role)&&($role!="")) echo "Khách hàng"?></option>
                                <option value="1" ><?php if(isset($role)&&($role!="")) echo "Admin"?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($idtk)&&($idtk > 0)) echo $idtk;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>