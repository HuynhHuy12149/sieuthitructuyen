<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="row">
            <div class="row formtitle">
                <p>CẬP NHẬT LOẠI HÀNG HÓA</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        <p>Mã loại</p>
                        <input type="text" value="<?php if(isset($id)&&($id > 0)) echo $id;?>" name="maloai" style="background-color: #EEE;" disabled>
                    </div>
                    <div class="row mb10">
                        <p>Tên loại</p>
                        <input type="text" value="<?php if(isset($name)&&($name!="")) echo $name;?>" name="tenloai" id="">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0)) echo $id;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>