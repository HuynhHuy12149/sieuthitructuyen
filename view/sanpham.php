<div class="row">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtitle sptheodm">SẢN PHẨM <?=$tendm?></div>
                    <div class="row boxcontent">
                    <?php
                        $i = 0; 
                        foreach($dssp as $sp){
                            extract($sp);
                            $linksp="index.php?act=sanphamct&idsp=".$idsp;
                            $hinh = $img_path.$img;
                            if(($i==3) || ($i == 7) || ($i == 11) || ($i == 15)){
                                $mr="";
                            }else{
                                $mr="mr";
                            }
                            echo '<a href="'.$linksp.'" class="linkchitiet">
                                    <div class="boxsp '.$mr.'">
                                        <div class="row img mrt10">
                                            <img src="'.$hinh.'" alt="">
                                        </div>
                                        <p>$'.$price.'</p>
                                        <span>'.$namesp.'</span>
                                    </div>
                                </a>';
                            $i++;
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="boxphai">
                <?php
                    include "boxright.php";
                ?>
            </div>
        </div>