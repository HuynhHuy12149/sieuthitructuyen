<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/sanpham.php";
    include "../model/thongke.php";
    include "../model/cart.php";
    include "header.php";

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
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id,$tenloai);
                    //$thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;


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
                    $target_dir = "../upload/";
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
                include "sanpham/add.php";
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
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sp = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
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
                include "sanpham/list.php";
                break;
                // controller khach hang
            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'addtk':
                //kiem tra người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $fullname=$_POST['fullname'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $role=$_POST['role'];
                    insert_taikhoan($user,$pass,$fullname,$email,$address,$tel,$role);
                    $thongbao = "Thêm thành công";
                }
                include "taikhoan/add.php";
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_tk($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'suatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $tk = loadone_taikhoan($_GET['id']);
                }
                
                include "taikhoan/update.php";
                break;
            case 'updatetk':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $idtk = $_POST['id'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $fullname=$_POST['fullname'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $role=$_POST['role'];
    
                    update_taikhoan($idtk,$user, $pass , $fullname, $email,$address,$tel,$role);
                        //$thongbao = "Cập nhật thành công";
                }
                $listtaikhoan = loadall_taikhoan();
                
                include "taikhoan/list.php";
                break;
            //binh luan
            case 'dsbl':
                $listbl = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_bl($_GET['id']);
                }
                $listbl = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
                //cac don hang
            case 'dsdh':
                if(isset($_POST['loc'])&&($_POST['loc'])){
                    $keyw = $_POST['kyw'];
                }else{
                    $keyw = '';
                }
                $listbill = loadall_bill($keyw,0);
                include "bill/list.php";
                break;
            case 'xoabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_bill($_GET['id']);
                }
                $listbill = loadall_billid(0);
                include "bill/list.php";
                break;
            case 'suabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $bill = loadone_bill($_GET['id']);
                }
                    
                include "bill/update.php";
                break;
            case 'updatebill':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $idbill = $_POST['id'];
                    $bill_status = $_POST['bill_status'];
        
                    update_bill($idbill,$bill_status);
                            //$thongbao = "Cập nhật thành công";
                }
                    $listbill = loadall_billid(0);
                    
                    include "bill/list.php";
                    break;    
            case 'thongke':
                $listhongke = loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listhongke = loadall_thongke();
                include "thongke/bieudo.php";
                break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }



    include "footer.php";
?>