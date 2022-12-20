<div class="row">
            <div class="row formtitle">
                <p>THÊM TÀI KHOẢN</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=addtk" method="post">
                    
                    <div class="row mb10">
                        <p>Username</p>
                        <input type="text" value="" name="user" id="">
                    </div>
                    <div class="row mb10">
                        <p>Password</p>
                        <input type="text" value="" name="pass" id="">
                    </div>
                    <div class="row mb10">
                        <p>FullName</p>
                        <input type="text" value="" name="fullname" id="">
                    </div>
                    <div class="row mb10">
                        <p>Email</p>
                        <input type="text" value="" name="email" id="">
                    </div>
                    <div class="row mb10">
                        <p>Địa Chỉ</p>
                        <input type="text" value="" name="address" id="">
                    </div>
                    <div class="row mb10">
                        <p>Số Điện Thoại</p>
                        <input type="text" value="" name="tel" id="">
                    </div>
                    <div class="row mb10">
                        <p>Loại Tài Khoản</p>
                        <select name="role" id="">
                            <option value="0">Khách hàng</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm Mới">
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