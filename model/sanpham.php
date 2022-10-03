<?php
function insert_sanpham($tensp, $giasp , $hinh, $mota,$iddm){
    $sql="insert into sanpham(namesp,price,img,mota,iddm) values('$tensp', '$giasp' , '$hinh', '$mota', '$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id){
    $sql="delete from sanpham where idsp=".$id;
    pdo_execute($sql);
}

function loadall_sanpham($keyw,$iddm){
    $sql="select * from sanpham where 1";//where 1 tất là câu này nó đúng
    if($keyw != ""){
        $sql.=" and namesp like '%".$keyw."%'";
    }
    if($iddm > 0){
        $sql.=" and iddm = '".$iddm."'";
    }
    $sql.=" order by idsp desc";//nối chuổi nhớ cách khoảng
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where idsp=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_sanpham($idsp,$tensp, $giasp , $hinh, $mota ,$iddm){
    if($hinh!="")
        $sql="update sanpham set namesp='".$tensp."', price='".$giasp."', img='".$hinh."', mota='".$mota."', iddm='".$iddm."' where idsp=".$idsp;
    else
        $sql="update sanpham set namesp='".$tensp."', price='".$giasp."', mota='".$mota."', iddm='".$iddm."' where idsp=".$idsp;
    pdo_execute($sql);
}

function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by idsp desc limit 0,16";//where 1 tất là câu này nó đúng
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";//where 1 tất là câu này nó đúng
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_sanpham_cungloai($idsp,$iddm){
    $sql = "select * from sanpham where iddm=".$iddm." and idsp <>".$idsp;
    $listsanpham = pdo_query($sql);
    return $listsanpham;;
}

?>