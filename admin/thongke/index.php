<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";

    include "../../model/cart.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();

    include "../header.php";
    include "../menu.php";


    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'thongke':
                $listhongke = loadall_thongke();
                include "list.php";
                break;
            case 'bieudo':
                $listhongke = loadall_thongke();
                include "bieudo.php";
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