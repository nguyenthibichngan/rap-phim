<?php
require_once("phim.php");
require_once("PhimModel.php");


if(isset($_POST['tenphim']) && isset($_POST['hinhanhphim']) && isset($_POST['phanloai'])
&& isset($_POST['daodien']) &&isset($_POST['dienvien']) && isset($_POST['theloai'])
&& isset($_POST['khoichieu']) && isset($_POST['thoiluong']) && isset($_POST['trailer'])
&& isset($_POST['tinhtrangphim']))
{
    $link =NULL;
    taoKetNoi($link);
    Add($link, $_POST['tenphim'], $_POST['hinhanhphim'], $_POST['phanloai'],
    $_POST['daodien'], $_POST['dienvien'], $_POST['theloai'], $_POST['khoichieu'],
    $_POST['thoiluong'], $_POST['trailer'], $_POST['tinhtrangphim']);
    giaiPhongBoNho($link,$result);
    header("Location: quanlyPhim.php?msg=them");
}
?>
