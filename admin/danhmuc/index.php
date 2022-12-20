<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";
    include "../../model/danhmuc.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();

    include "../header.php";
    include "../menu.php";


    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            /* controller danh muc */
            case 'adddm':
                //kiem tra người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "add.php";
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "list.php";
                break;
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id,$tenloai);
                    //$thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
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