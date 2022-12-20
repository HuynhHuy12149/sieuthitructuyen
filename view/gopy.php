<div class="row">
  <div class="boxtrai mr">
    <div class="row mb">
        <div class="container">
        <div class="title">Góp Ý</div>
        <div class="content">
          <form action="index.php?act=gopy" method="post">
            <div class="user-details">
                <div class="">
                    <textarea  name="noidung" id="" cols="100" rows="10"></textarea>
                    
                </div>
                
                <div class="button" >
                    <input type="submit" style name="gopyn" value="Gửi">
                </div>
            </div>
          </form>
          <h4 class="thongbao" style="color:red;">
            <?php
                if(isset($thongbao)&&($thongbao != "")){
                  echo $thongbao;
                }
            ?>
          </h4>
        </div>
      </div>
    </div>
</div>
<div class="boxphai">
                <?php
                    include "view/boxright.php";
                ?>
            </div>
</div>