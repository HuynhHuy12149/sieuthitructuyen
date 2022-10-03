<?php
  function loadall_thongke(){
    $sql = "select danhmuc.name as tendanhmuc, count(sanpham.idsp) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as giatrungbinh";
    $sql.="  from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
  }
?>