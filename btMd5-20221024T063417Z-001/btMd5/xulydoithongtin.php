<?php 
require_once ("../../models/model/user_module.php");
require_once("../../ketnoidulieu/db_module.php");
    $hoten = $_POST['hoten'];
    $taikhoan = $_POST['taikhoan'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $uss = GetUserTheoUserName($taikhoan);
    $id = $uss -> GetIDUS();
    $mk = $uss -> GetMatKhau();
    $us = new user($id,$hoten,$taikhoan,$mk,$sdt,$email);
    $kq = AddNewUS($us);
    if($kq){
        header("Location: ../../maintam.php?user=".$taikhoan."&nd=xemttuser&nd=themthanhcong");
    }
    else{
        header("Location: ../../maintam.php?user=".$taikhoan."&nd=xemttuser&nd=themthatbai");
    }
    

?>