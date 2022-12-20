<?php
    session_start();
    if(isset($_SESSION['admin'])){
        header('location: danhmuc');
    }else{
        header('location: login');
    }
?>