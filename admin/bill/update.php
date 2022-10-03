<?php
    if(is_array($bill)){
        extract($bill);
    }
?>
<div class="row">
            <div class="row formtitle">
                <p>CẬP NHẬT LOẠI HÓA ĐƠN</p>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatebill" method="post">
                    <div class="row mb10">
                        <p>Mã Hóa Đơn</p>
                        <input type="text" value="<?php if(isset($idbill)&&($idbill > 0)) echo "DAM-".$idbill;?>" name="maloai" style="background-color: #EEE;" disabled>
                    </div>
                    <div class="row mb10">
                        <p>Tình Trạng</p>
                        <select name="bill_status" id="">
                            <?php
                            if(isset($bill_status)&&($bill_status!="")&&$bill_status  == 0){  
                            ?>
                                <option value="0" selected ><?php if(isset($bill_status)&&($bill_status!="")) echo "Tình Trạng Mới"?></option>
                                <option value="1"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Xử Lí"?></option>
                                <option value="2"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Giao Hàng"?></option>
                                <option value="3"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Hoàn Tất"?></option>
                            <?php
                                }
                            ?>
                            <?php
                            if(isset($bill_status)&&($bill_status!="")&&$bill_status  == 1){  
                            ?>
                                <option value="0" ><?php if(isset($bill_status)&&($bill_status!="")) echo "Tình Trạng Mới"?></option>
                                <option value="1" selected  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Xử Lí"?></option>
                                <option value="2"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Giao Hàng"?></option>
                                <option value="3"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Hoàn Tất"?></option>
                            <?php
                                }
                            ?>
                             <?php
                            if(isset($bill_status)&&($bill_status!="")&&$bill_status  == 2){  
                            ?>
                                <option value="0"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Tình Trạng Mới"?></option>
                                <option value="1"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Xử Lí"?></option>
                                <option value="2" selected  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Giao Hàng"?></option>
                                <option value="3"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Hoàn Tất"?></option>
                            <?php
                                }
                            ?>
                             <?php
                            if(isset($bill_status)&&($bill_status!="")&&$bill_status  == 3){  
                            ?>
                                <option value="0"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Tình Trạng Mới"?></option>
                                <option value="1"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Xử Lí"?></option>
                                <option value="2"  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Đang Giao Hàng"?></option>
                                <option value="3" selected  ><?php if(isset($bill_status)&&($bill_status!="")) echo "Hoàn Tất"?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($idbill)&&($idbill > 0)) echo $idbill;?>">
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