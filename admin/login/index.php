<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/danhmuc.php";
    include "../../model/taikhoan.php";
    
    include "../header.php";
 
    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            /* controller danh muc */
            case 'dangnhap':
              if(isset($_POST['login'])&&($_POST['login'])){
                $user = $_POST['username'];
                $pass = md5($_POST['password']) ;
                $checkadmin = check_admin($user,$pass);
                if(is_array($checkadmin)){
                    $_SESSION['admin'] = $checkadmin;
                    // $thongbao = "Bạn đã đăng nhập thành công";
                    header('Location: ../index.php');
                }else{
                    $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
                }
                
            }
            include "formdangnhap.php";
            break;
            case 'logout':
              unset($_SESSION['admin']);
              header('location: ../index.php');
              break;
            default:
            include "formdangnhap.php";
                break;
        }
    }else{
      include "formdangnhap.php";
    }
    include "../footer.php";
 
?>