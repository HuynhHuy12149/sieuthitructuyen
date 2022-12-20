<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";
    include "../../model/taikhoan.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();

    include "../header.php";
    include "../menu.php";


    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
                // controller khach hang
            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "list.php";
                break;
            case 'addtk':
                //kiem tra người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    
                    $user=$_POST['user'];
                    $pass= md5($_POST['pass']);
                    $fullname=$_POST['fullname'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $role=$_POST['role'];
                    insert_taikhoan($user,$pass,$fullname,$email,$address,$tel,$role);
                    $thongbao = "Thêm thành công";
                }
                include "add.php";
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_tk($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "list.php";
                break;
            case 'suatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $tk = loadone_taikhoan($_GET['id']);
                }
                
                include "update.php";
                break;
            case 'updatetk':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $idtk = $_POST['id'];
                    $user=$_POST['user'];
                    $pass=md5($_POST['pass']);
                    $fullname=$_POST['fullname'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $role=$_POST['role'];
    
                    update_taikhoan($idtk,$user, $pass , $fullname, $email,$address,$tel,$role);
                        //$thongbao = "Cập nhật thành công";
                }
                $listtaikhoan = loadall_taikhoan();
                
                include "list.php";
                break;
              case 'logout':
              unset($_SESSION['admin']);
              header('location: ../index.php');
              break;
            default:
                include "../home.php";
                break;
        }
    }else{
        include "../home.php";
    }



    include "../footer.php";
?>