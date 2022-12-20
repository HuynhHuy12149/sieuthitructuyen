<div style="display: flex; align-items: center;justify-content: center; margin-top: 9%;">
  <div style="max-width: 700px;">
    <div class="row mb">
        <div class="container">
        <div style="text-align: center; font-weight: 600;font-size: 20px;">Đăng nhập</div>
        <br>
        <div class="content">
          <form action="index.php?act=dangnhap" method="post">
            <div class="user-details">
              <div style="width: 100%;" class="input-box">
                <span class="details">Username</span>
                <input type="text" name="username" placeholder="Your Username" required>
              </div>
              <div style="width: 100%;" class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Your Password" required>
              </div>
            </div>
            <div class="button">
              <input type="submit" name="login" value="Login">
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
