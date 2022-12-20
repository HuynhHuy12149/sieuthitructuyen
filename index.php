<?php
    session_start();
    include "model/danhmuc.php"; 
    include "model/pdo.php";
    include "model/sanpham.php";
    include "global.php";
    include "view/header.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    require "mail/sendmail.php";

    
    

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
            case 'gopy':
                if(isset($_POST['gopyn'])&&($_POST['gopyn']) && isset($_SESSION['member'])) {
                    $noidung = $_SESSION['member']['email'].'<br>'.$_POST['noidung'];
                    
                    $tieude = "Gop Y";
                    $email ="huynhhuy12149@gmail.com";
                    $mail = new Mailer();
                    $mail-> mailhoadon($email,$tieude,$noidung);
                    $thongbao="Gửi góp ý thành công";
                }
                    include "view/gopy.php";
                    break;
            case 'lienhe':
                if(isset($_POST['btnlienhe'])&&($_POST['btnlienhe']) ) {
                    $noidung = 'Tên:'.$_POST['ten'].'Email :'.$_POST['email'].'Nội Dung'.$_POST['noidung'];
                    
                    $tieude = $_POST['tieude'];
                    $email =$_POST['email'];
                    $mail = new Mailer();
                    $mail->mailhoadon($email,$tieude,$noidung);
                    $thongbao="Gửi góp ý thành công";
                }
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

                if(isset($_POST['dangky'])&&($_POST['dangky']) && isset($_POST['g-recaptcha-response'])&&!empty($_POST['g-recaptcha-response'])){
                    $user = $_POST['user'];
                    $pass = md5($_POST['pass']) ;
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    insert_taikhoandk($user, $pass ,$fullname, $email, $address,$phone);
                    $thongbao="Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng.";
                }else{
                    $thongbao="Không đăng ký được vui lòng thử lại";
                }
                
                include "view/taikhoan/dangky.php";
                break;
             case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user = $_POST['username'];
                    $pass = md5($_POST['password']) ;
                    $checkuser = check_user($user,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['member'] = $checkuser;
                        // $thongbao = "Bạn đã đăng nhập thành công";
                        header('Location: index.php');
                    }else{
                        $thongbao="Sai thông tin tài khoản hoặc mật khẩu";
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
                    update_taikhoanuser($idtk,$user, $pass ,$fullname, $email, $address,$phone);
                    $_SESSION['member'] = check_user($user,$pass);
                    $thongbao="Thay đổi thành công.";
                    header('Location: index.php?act=thaydoithongtincanhan');
                }
                include "view/taikhoan/editmember.php";
                break;
            case 'thoat':
                
                session_unset();
                header('Location: index.php');
            case 'quenmatkhau':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    
                    $email = $_SESSION['member']['email'];
                    $checkemail = check_email($email);
                    if(is_array($checkemail)){
                        $thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
                    }else{
                        $thongbao = "Email này không tồn tại";
                    }
                }
                include "view/taikhoan/quenmatkhau.php";
                break;
            case 'addtocart':
                
                if(isset($_SESSION['member'])){
                    if(isset($_POST['addtocartbtn'])&&($_POST['addtocartbtn'])){
                        $idsp = $_POST['idsp'];
                        $namesp = $_POST['namesp'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = $_POST['soluong'];
                        $thanhtien = $soluong * $price;
                        
                        $sl=1;
                        $i =0;
                        $check=0;
                        if(isset($_SESSION['mycart'])&& count($_SESSION['mycart'])>0){
                            foreach($_SESSION['mycart'] as $spcart){
                                if($spcart[0]==$idsp){
                                    $sl+=$spcart[4];
                                    $_SESSION['mycart'][$i][4]=$sl;
                                    $check=1;
                                    break;
                                }
                                $i++;
                            }
                        }

                        if($check == 0){
                            $spadd = [$idsp,$namesp,$img,$price,$soluong,$thanhtien];
                            array_push($_SESSION['mycart'],$spadd);
                        }
                        
                    }

                    
                    include "view/cart/viewcart.php";
                    break;
                }else{
                      include "view/home.php";
                }
                break;
                    
             
            case 'delcart':
                if(isset($_GET['idcart'])){
                    $id = $_GET['idcart'];
                    array_splice($_SESSION['mycart'],$id,1);//mảng,vị trí cần xóa,xóa bao nhiêu cái
                }else{
                    $_SESSION['mycart']=[];
                }
                header('location: index.php?act=viewcart');
                break;
            case 'updatecart':
                if(isset($_POST['capnhatvohang'])&& $_POST['capnhatvohang'] ){
                    $idsp=[];
                    $slcp = [];
                    $idsp = $_POST['idsp'];
                    $slcp = $_POST['soluongcapnhat'];
                    
                    for($i=0;$i<count($idsp);$i++){
                        foreach($_SESSION['mycart'] as $spcart){
                            if($spcart[0]==$idsp[$i]){
    
                                $_SESSION['mycart'][$i][4]=$slcp[$i];
                                
                                break;
                            }
                            
                        }
                    }
                    
                    

                            
                    
                }
                include "view/cart/viewcart.php";
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
                    $tieude="SIEU THI TRUC TUYEN";
                    
                    $mail = new Mailer();
                    
                    // tạo bill
                    $idbill = insert_bill($iduser,$name, $address,$tel, $email,$pttt,$ngaydathang,$tongdonhang);
                    $noidung ="";
                    //insert into cart: $_session['mycart'] & idbill;
                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['member']['idtk'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                        
                        $noidung .= 'sản phẩm: '.$cart[1].'.Giá: '.$cart[3].'<br>';
                    }
                    $noidung = $noidung.'Cảm Ơn Quý Khách';
                    $mail->mailhoadon($email,$tieude,$noidung);

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

            case 'xemtrang':
                $sp_tungtrang = 12;
                if(!isset($_GET['trang'])){
                    $trang = 1;
                    $act= $xemtrang;
                }else {
                    $trang = $_GET['trang'];
                }
                $tungtrang = ($trang-1)*$sp_tungtrang;
                $sppage = loadall_sanpham_home_trang($tungtrang,$sp_tungtrang);
                include "view/homepage.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        $sp_tungtrang = 12;
        if(!isset($_GET['trang'])){
             $trang = 1;
                    
        }else {
            $trang = $_GET['trang'];
        }
        $tungtrang = ($trang-1)*$sp_tungtrang;
        $sppage = loadall_sanpham_home_trang($tungtrang,$sp_tungtrang);
        include "view/homepage.php";
    }

    include "view/footer.php";
?>