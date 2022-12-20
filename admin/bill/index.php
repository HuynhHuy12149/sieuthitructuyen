<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";
    include "../../model/cart.php";
    include "../../model/taikhoan.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();


    include "../header.php";
    include "../menu.php";

    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'dsdh':
                if(isset($_POST['loc'])&&($_POST['loc'])){
                    $keyw = $_POST['kyw'];
                }else{
                    $keyw = '';
                }
                $listbill = loadall_bill($keyw,0);
                include "list.php";
                break;
            case 'xoabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_bill($_GET['id']);
                }
                $listbill = loadall_billid(0);
                include "list.php";
                break;
            case 'chitiet':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $onebill = loadone_bill($id);
                    $listcart = loadall_cart($id);
                    $khachhang = loadone_taikhoan($onebill['iduser']);
                  }
                include 'chitiet.php';
                break;
            case 'suabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $bill = loadone_bill($_GET['id']);
                }
                    
                include "update.php";
                break;
            case 'updatebill':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $idbill = $_POST['id'];
                    $bill_status = $_POST['bill_status'];
        
                    update_bill($idbill,$bill_status);
                            //$thongbao = "Cập nhật thành công";
                }
                    $listbill = loadall_billid(0);
                    
                    include "list.php";
                    break;    
            case 'thongke':
                $listhongke = loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listhongke = loadall_thongke();
                include "thongke/bieudo.php";
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