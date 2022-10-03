<div class="row">
            <div class="boxtrai mr">
                <div class="row mb">
                    <?php
                        extract($oneproduct);
                    ?>
                    <div class="boxtitle cttitilesp"><?=$namesp?></div>
                    <div class="row boxcontent">
                        <?php
                            $hinh = $img_path.$img;
                            echo '<div class="imgchitiet">
                                    <img src="'.$hinh.'">
                                </div>
                                <div class ="motachitiet">
                                    <span>Thông tin sản phẩm</span>
                                    <p>'.$mota.'</p>
                                </div>';
                        ?>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                $(document).ready(function(){    
                    $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$idsp?>});
                });
                </script>
                <div class="row" id="binhluan">
                    
                </div>
                <div class="row mb">
                    <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
                    <div class="row boxcontent">
                        <div class="sanphamcungloai">
                        <?php
                            foreach ($sp_cung_loai as $sp) {
                                extract($sp);
                                $linksp="index.php?act=sanphamct&idsp=".$idsp;
                                echo '<li><a href="'.$linksp.'">'.$namesp.'</a></li>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="boxphai">
                <?php
                    include "boxright.php";
                ?>
            </div>
        </div>