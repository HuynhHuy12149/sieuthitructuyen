<?php
  function Tongdonhang(){
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
      $thanhtien = $cart[3]*$cart[4];
      $tong+=$thanhtien;
    
    }
    return $tong;
  }

  function update_bill($idbill ,$bill_status){
    $sql="update bill set  idbill='".$idbill."', bill_status='".$bill_status."' where idbill=".$idbill;
    pdo_execute($sql);
  }
  function delete_bill($id){
    $sql="delete from bill where idbill=".$id;
    pdo_execute($sql);
  }
  function insert_bill($iduser,$name, $address,$tel, $email,$pttt,$ngaydathang,$tongdonhang){
    $sql="insert into bill(iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,bill_ngaydathang,total) values('$iduser','$name', '$address','$tel','$email','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_lastInsertId($sql);
  }

  function insert_cart($iduser, $idpro,$img, $name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser', '$idpro','$img', '$name','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
  }

  function loadone_bill($id){
    $sql = "select * from bill where idbill=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill){
  $sql = "select * from cart where idbill=".$idbill;
  $bill = pdo_query($sql);
  return $bill;
}

function loadall_bill($keyw,$iduser){
  $sql = "select * from bill where 1";
  if($keyw != ""){
    $sql.=" and idbill like '%".$keyw."%'";
  }
  if($iduser>0)
  {
    $sql.=" AND iduser=".$iduser;
  }
  $sql.=" order by idbill desc";
  $bill = pdo_query($sql);
  return $bill;
}
function loadall_billid($iduser){
  $sql = "select * from bill where 1";
  
  if($iduser>0)
  {
    $sql.=" AND iduser=".$iduser;
  }
  $sql.=" order by idbill desc";
  $listbill = pdo_query($sql);
  return $listbill;
}
function loadall_cart_count($idbill){
  $sql = "select * from cart where idbill=".$idbill;
  $bill = pdo_query($sql);
  return sizeof($bill);
}

function get_ttdh($status){
  switch($status){
    case '0':
      $tt="Đơn hàng mới";
      break;
    case '1':
      $tt="Đang xử lý";
      break;
    case '2':
      $tt="Đang giao hàng";
      break;
    case '3':
      $tt="Hoàn tất";
      break;
    default:
      $tt="Đơn hàng mới";
      break;
  }

  return $tt;

}

function bill_chi_tiet($listbill){
  global $img_path;
  $tong = 0;
  $i = 0;
  echo '<tr>
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>';

  foreach ($listbill as $cart) {
    $hinh = $img_path.$cart['img'];
    $tong+= $cart['thanhtien'];
    echo '<tr>
        <td><img src="'.$hinh.'" alt="" height="80px"></td>
        <td>'.$cart['name'].'</td>
        <td>'.$cart['price'].'</td>
        <td>'.$cart['soluong'].'</td>
        <td>'.$cart['thanhtien'].'</td>
    </tr>';
    $i++;
  }
  echo ' <tr>
  <td colspan="4">Tổng đơn hàng</td>
  <td>'.$tong.'</td>
</tr>';
}
?>

