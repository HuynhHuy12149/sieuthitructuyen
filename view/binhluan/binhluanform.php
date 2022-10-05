<?php
  session_start();
  include "../../model/pdo.php";
  include "../../model/binhluan.php";

  
  
    $idpro=$_REQUEST['idpro'];

    //$fullnameuser = $_SESSION['member']['fullname'];
    $dsbl=loadall_binhluan($idpro);
    //$dsbl=loadall_binhluannoiban($idpro);
  
  
    
  
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  
</head>
<style>
  .binhluan table{
    width: 90%;
    margin-left:5%
  }

  .binhluan table td:nth-child(1){
    width:20%;
  }
  .binhluan table td:nth-child(2){
    width:50%;
  }
  .binhluan table td:nth-child(3){
    width:30%;
  }
</style>
<body>
<div class="row mb30">
    <div class="boxtitle">Bình luận</div>
      <div class="boxcontent2 menudoc binhluan">
          <table>
          <ul>
            <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td><b>● '.$fullnameuser.'</b></.td>';
                    echo '<td>'.$noidung.'</td>';
                    echo '<td>'.$ngaybinhluan.'</td>';
                    
                }
            ?>
          </ul>
          </table>
      </div>
          <div class="boxfooter searchbox">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
              <input type="hidden" name="idproduct" value="<?=$idpro?>">
              
              <?php
                  if(isset($_SESSION['member'])){
              ?>
                    <input type="text" name="message" placeholder="Nhập bình luận của bạn về sản phẩm">
                    <input  type="submit" name="guibl" Value="Gửi">
              <?php      
                  }else{
              ?>
                    <input type="text" name="message" placeholder="Vui lòng đăng nhập để bình luận sản phẩm"  disabled>
                    <input type="submit" name="guibl" Value="Gửi" disabled>
              <?php      
                  }                 
              ?>
            </form>
          </div>
      </div>
      <?php
        if(isset($_SESSION['member'])){
          if(isset($_POST['guibl'])&&($_POST['guibl'])){
            $noidung = $_POST['message'];
            $idproduct = $_POST['idproduct'];
            $iduser = $_SESSION['member']['idtk'];
            $fullnameuser = $_SESSION['member']['fullname'];
            $ngaybinhluan = date("h:i:sa d/m/Y");
            insert_binhluan($noidung, $iduser,$fullnameuser ,$idproduct, $ngaybinhluan);
            header("location: ".$_SERVER['HTTP_REFERER']);
            
          }
        }else{
          return;
        }
        
      ?>
</body>
</html>