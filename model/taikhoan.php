<?php
  function insert_taikhoan($user, $pass ,$fullname, $email, $address,$phone,$role){
    $sql="insert into taikhoan(user,pass,fullname,email,address,tel,role) values('$user', '$pass' , '$fullname' , '$email', '$address', '$phone','$role')";
    pdo_execute($sql);
}

function check_user($user,$pass){
  $sql = "select * from taikhoan where user='".$user."' AND pass='".$pass."'";
  $tk = pdo_query_one($sql);
  return $tk;
}

function delete_tk($id){
  $sql="delete from taikhoan where idtk=".$id;
  pdo_execute($sql);
}

function check_email($email){
  $sql = "select * from taikhoan where email='".$email."'";
  $tk = pdo_query_one($sql);
  return $tk;
}

function update_taikhoan($idtk ,$user, $pass ,$fullname, $email, $address,$phone,$role){
  $sql="update taikhoan set  user='".$user."', pass='".$pass."', fullname='".$fullname."', email='".$email."', address='".$address."', tel='".$phone."',role='".$role."' where idtk=".$idtk;
  pdo_execute($sql);
}


function loadall_taikhoan(){
  $sql="select * from taikhoan order by idtk desc";
  $listtaikhoan = pdo_query($sql);
  return $listtaikhoan;
}
function loadone_taikhoan($id){
  $sql = "select * from taikhoan where idtk=".$id;
  $tk = pdo_query_one($sql);
  return $tk;
}
?>