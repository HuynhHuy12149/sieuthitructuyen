<div class="row">
            <div class="boxtrai mr">
                <div class="row mb">
                <div class="row">
                    
                </div>
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
                                        <div class="row btnaddtocart">
                                        <form action="index.php?act=addtocart" method="post">
                                            <input type="hidden" name="idsp" value="'.$idsp.'">
                                            <input type="hidden" name="namesp" value="'.$namesp.'">
                                            <input type="hidden" name="img" value="'.$img.'">
                                            <input type="hidden" name="price" value="'.$price.'">
                                            <input type="hidden" name="soluong" value="1">
                                            <input type="submit" name="addtocartbtn" value="Add to cart">
                                        </form>
                                    </div>
                                </a>
                                
                                </div> ';
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