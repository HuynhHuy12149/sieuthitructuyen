<?php
  function insert_binhluan($noidung, $iduser,$fullnameuser ,$idpro, $ngaybinhluan){
    $sql="insert into binhluan(noidung,iduser,fullnameuser,idpro,ngaybinhluan) values('$noidung', '$iduser','$fullnameuser' , '$idpro' , '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro){
  $sql="select * from binhluan where 1";
  if($idpro > 0){
    $sql.=" AND idpro='".$idpro."'";
  }
  
  $sql.=" order by idbl desc";
  $listbl = pdo_query($sql);
  return $listbl;
}

function loadall_binhluannoiban($idpro){
  $sql="select * from binhluan , taikhoan  where 1 and binhluan.iduser = taikhoan.idtk and idpro=".$idpro;
  
  $listbl = pdo_query($sql);
  return $listbl;
}
function delete_bl($id){
  $sql="delete from binhluan where idbl=".$id;
  pdo_execute($sql);
}
?>