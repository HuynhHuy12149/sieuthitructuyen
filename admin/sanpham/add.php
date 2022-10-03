<div class="row">
            <div class="row formtitle">
                <p>THÊM MỚI HÀNG HÓA</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        <p>Danh mục</p>
                        <select name="iddm">
                            <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            ?>                 
                        </select>
                    </div>
                    <div class="row mb10">
                        <p>Tên sản phẩm</p>
                        <input type="text" name="tensp">
                    </div>
                    <div class="row mb10">
                        <p>Đơn giá</p>
                        <input type="text" name="gia">
                    </div>
                    <div class="row mb10">
                        <p>Hình ảnh</p>
                        <input type="file" name="hinhanh">
                    </div>
                    <div class="row mb10">
                        <p>Mô tả</p>
                        <textarea name="mota" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Reset">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>