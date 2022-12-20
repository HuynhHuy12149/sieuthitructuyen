<div class="row">
  <div class="boxtrai mr">
    <div class="row mb">
        <div class="container">
        <div class="title">Quên mật khẩu</div>
        <div class="content">
        <?php
            if(isset($_SESSION['member'])&&(is_array($_SESSION['member']))){
              extract($_SESSION['member']);
            } 
        ?>
          <form action="index.php?act=quenmatkhau" method="post">
            <div class="user-details">
              <div class="input-box" style="width:100%">
                <span class="details">Email</span>
                <input type="email" value="<?=$email?>" disabled name="email" placeholder="Enter your email" required>
              </div>
            </div>
            <div class="button">
              <input type="submit" name="guiemail" value="Gửi email">
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