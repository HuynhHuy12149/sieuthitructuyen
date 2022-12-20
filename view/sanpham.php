<div class="row">
            <div class="boxtrai mr">
                <div class="row mb">
                <div class="row">
                    <div class="banner mb">
                        <!-- auto slider start  -->
                        <div class="img-slider">
                            <div class="slide active">
                              <img src="view/images/1.jpg" alt="">
                              <div class="info">
                                <h2>HAT FISHERMAN</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                            <div class="slide">
                              <img src="view/images/2.jpg" alt="">
                              <div class="info">
                                <h2>ACHES DIA</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                            <div class="slide">
                              <img src="view/images/3.jpg" alt="">
                              <div class="info">
                                <h2>COLOR S32</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                            <div class="slide">
                              <img src="view/images/4.jpg" alt="">
                              <div class="info">
                                <h2>IMP XIAOMI</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                            <div class="slide">
                              <img src="view/images/5.jpg" alt="">
                              <div class="info">
                                <h2>HAVANA</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                            <div class="navigation">
                              <div class="btn active"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                            </div>
                          </div>
                        <!-- auto slider end -->
                    </div>
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