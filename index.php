<?php
    session_start();
    include "model/danhmuc.php"; 
    include "model/pdo.php";
    include "model/sanpham.php";
    include "global.php";
    include "view/header.php";
    include "model/taikhoan.php";
    include "model/cart.php";

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $top10 = loadall_sanpham_top10();

    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $idsp = $_GET['idsp'];
                    $oneproduct = loadone_sanpham($idsp);
                    extract($oneproduct);
                    $sp_cung_loai = load_sanpham_cungloai($idsp,$iddm);
                    include "view/sanphamchitiet.php";
                }else{
                    include "view/home.php";
                }
                break;
            case 'sanpham':
                // search
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                // load theo danh muc
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm = $_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp = loadall_sanpham($kyw,$iddm);
                $tendm = loadname_danhmuc($iddm);
                include "view/sanpham.php";
                break;
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    insert_taikhoan($user, $pass ,$fullname, $email, $address,$phone);
                    $thongbao="???? ????ng k?? th??nh c??ng. Vui l??ng ????ng nh???p ????? th???c hi???n ch???c n??ng b??nh lu???n ho???c ?????t h??ng.";
                }
                include "view/taikhoan/dangky.php";
                break;
             case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $checkuser = check_user($user,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['member'] = $checkuser;
                        // $thongbao = "B???n ???? ????ng nh???p th??nh c??ng";
                        header('Location: index.php');
                    }else{
                        $thongbao="Sai th??ng tin t??i kho???n ho???c m???t kh???u";
                    }
                    
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'thaydoithongtincanhan':
                if(isset($_POST['updateuser'])&&($_POST['updateuser'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $idtk = $_POST['idtk'];
                    update_taikhoan($user, $pass ,$fullname, $email, $address,$phone,$idtk);
                    $_SESSION['member'] = check_user($user,$pass);
                    $thongbao="Thay ?????i th??nh c??ng.";
                    header('Location: index.php?act=thaydoithongtincanhan');
                }
                include "view/taikhoan/editmember.php";
                break;
            case 'thoat':
                session_unset();
                header('Location: index.php');
            case 'quenmatkhau':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email = $_POST['email'];
                    $checkemail = check_email($email);
                    if(is_array($checkemail)){
                        $thongbao = "M???t kh???u c???a b???n l??: ".$checkemail['pass'];
                    }else{
                        $thongbao = "Email n??y kh??ng t???n t???i";
                    }
                }
                include "view/taikhoan/quenmatkhau.php";
                break;
            case 'addtocart':
                if(isset($_POST['addtocartbtn'])&&($_POST['addtocartbtn'])){
                    $idsp = $_POST['idsp'];
                    $namesp = $_POST['namesp'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $thanhtien = $soluong * $price;
                    $spadd = [$idsp,$namesp,$img,$price,$soluong,$thanhtien];
                    array_push($_SESSION['mycart'],$spadd);
                    
                }
                include "view/cart/viewcart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    $id = $_GET['idcart'];
                    array_splice($_SESSION['mycart'],$id,1);//m???ng,v??? tr?? c???n x??a,x??a bao nhi??u c??i
                }else{
                    $_SESSION['mycart']=[];
                }
                header('location: index.php?act=viewcart');
                break;
            case 'bill':
                include "view/cart/bill.php";
                break;
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
            case 'billcomfirm':
                if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                    if($_SESSION['member']) $iduser=$_SESSION['member']['idtk'];
                    else $iduser=0;
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang=date('h:i:sa d/m/Y');
                    $tongdonhang = Tongdonhang();
                    // t???o bill
                    $idbill = insert_bill($iduser,$name, $address,$tel, $email,$pttt,$ngaydathang,$tongdonhang);

                    //insert into cart: $_session['mycart'] & idbill;
                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['member']['idtk'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }

                    $_SESSION['mycart']=[];
                }
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include "view/cart/billcomfirm.php";
                break;
            case 'mybill':
                $listbill = loadall_bill("",$_SESSION['member']['idtk']);
                include "view/cart/mybill.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }

    include "view/footer.php";
?>