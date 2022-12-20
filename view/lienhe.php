
<div class="row">
  <div class="boxtrai mr">
    <div class="row mb">
        <div class="container">
        <div class="title">Góp Ý</div>
        <div class="content">
          <form action="index.php?act=lienhe" method="post">
            <div class="user-details">
            <div class="input-box">
                <span class="details">Tên Bạn</span>
                <input type="text" name="ten" placeholder="Nhập Họ Tên..." required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" placeholder="Nhập email..." required>
              </div>
              <div class="input-box">
                <span class="details">Tiều Đề</span>
                <input type="text" name="tieude" placeholder="Tiêu Đề..." required>
              </div>
              <div class="input-box">
                <span class="details">Nội Dung</span>
                <textarea name="noidung" id="" cols="53" rows="3"></textarea>
              </div>
                <div class="button" >
                    <input type="submit" style name="btnlienhe" value="Gửi">
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