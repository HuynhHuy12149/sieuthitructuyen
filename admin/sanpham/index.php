<?php
    session_start();
    if(!isset($_SESSION['admin'])){
      header('location: ../login');
    }
    include "../../model/pdo.php";
    include "../../model/danhmuc.php";
    include "../../model/thongke.php";
    $listhongke = loadall_thongke();

    include "../../model/sanpham.php";

    include "../header.php";
    include "../menu.php";

    // controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            /* controller san pham */
            case 'addsp':
                //kiem tra người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['gia'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinhanh']['name'];
                    /* up load file len thu muc*/
                    $target_dir = "../../upload/";
                    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    insert_sanpham($tensp, $giasp , $hinh, $mota, $iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "add.php";
                break;
            case 'listsp':
                if(isset($_POST['loc'])&&($_POST['loc'])){
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $keyw = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw,$iddm);
                include "list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("",0);
                include "list.php";
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sp = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "update.php";
                break;
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $idsp=$_POST['idsp'];
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['gia'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinhanh']['name'];
                    /* up load file len thu muc*/
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " has been uploaded.";
                    }

                    update_sanpham($idsp,$tensp, $giasp , $hinh, $mota,$iddm);
                    //$thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("",0);
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