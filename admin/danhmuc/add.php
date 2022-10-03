<div class="row">
            <div class="row formtitle">
                <p>THÊM MỚI LOẠI HÀNG HÓA</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=addkh" method="post">
                    <div class="row mb10">
                        <p>Mã loại</p>
                        <input type="text" value="auto number" name="maloai" id="" disabled>
                    </div>
                    <div class="row mb10">
                        <p>Tên loại</p>
                        <input type="text" name="tenloai" id="">
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Reset">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>