<div class="row">
  <div class="boxtrai mr">
    <div class="row mb">
        <div class="container">
        <div class="title">Registration</div>
        <div class="content">
          <form action="index.php?act=dangky" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Full name</span>
                <input type="text" name="fullname" placeholder="Confirm your password" required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="user" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="pass" placeholder="Enter your number" required>
              </div>
              <div class="input-box">
                <span class="details">Address</span>
                <input type="text" name="address" placeholder="Confirm your password" required>
              </div>
              <div class="input-box">
                <span class="details">Phone number</span>
                <input type="text" class = "mobilenumber"  name="phone" placeholder="Enter your password" required>
              </div>
              <div class="row mb10 g-recaptcha" data-sitekey="6LcF3isjAAAAAJimApsuC7_yMbkSH9AMs-fnfbKG"></div>
              
            </div>
            <!-- <div class="gender-details">
              <input type="radio" name="gender" id="dot-1">
              <input type="radio" name="gender" id="dot-2">
              <input type="radio" name="gender" id="dot-3">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
                </label>
              </div>
            </div> -->
            <div class="button">
              <input type="submit" onclick="check_number()" name="dangky" value="Register">
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