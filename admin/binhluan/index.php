<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();

    include "../header.php";
    include "../menu.php";


    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            //binh luan
            case 'dsbl':
                $listbl = loadall_binhluan(0);
                include "list.php";
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_bl($_GET['id']);
                }
                $listbl = loadall_binhluan(0);
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