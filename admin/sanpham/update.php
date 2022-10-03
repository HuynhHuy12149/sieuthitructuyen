<?php
    if(is_array($sp)){
        extract($sp);
    }

    $imgpath="../upload/".$img;
    if(is_file($imgpath)){
        $hinh = "<img src='".$imgpath."' height='80'>";
    }else{
        $hinh = "no photo";
    }
?>
<div class="row">
            <div class="row formtitle">
                <p>CẬP NHẬT HÀNG HÓA</p>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        <select name="iddm" style="border:1px #ccc solid;padding:5px;">
                            <option value="0" selected>Tất cả</option>
                            <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    if($iddm == $id)
                                        echo '<option value="'.$id.'" selected>'.$name.'</option>';
                                    else
                                        echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            ?>                 
                        </select>
                        <!-- <p>Mã sản phẩm</p>
                        <input type="text" value="auto number" name="masp" disabled> -->
                    </div>
                    <div class="row mb10">
                        <p>Tên sản phẩm</p>
                        <input type="text" name="tensp" value="<?php if(isset($namesp)&&($namesp!="")) echo $namesp;?>">
                    </div>
                    <div class="row mb10">
                        <p>Giá</p>
                        <input type="text" name="gia" value="<?php if(isset($price)&&($price!="")) echo $price;?>">
                    </div>
                    <div class="row mb10">
                        <p>Hình ảnh</p>
                        <input type="file" name="hinhanh"><?=$hinh?>
                    </div>
                    <div class="row mb10">
                        <p>Mô tả</p>
                        <textarea name="mota" cols="30" rows="10"><?php if(isset($mota)&&($mota!="")) echo $mota;?></textarea>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="idsp" value="<?php if(isset($idsp)&&($idsp > 0)) echo $idsp;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>