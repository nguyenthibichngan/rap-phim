<?php
session_start();
   # require_once ("db_module.php");
   require_once("user.php");
    function dangKi($link, $idUser, $username, $password, $email){
        chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_user
            VALUE('".$idUser."', 'Phạm Lê Phương Trinh',
            '".mysqli_real_escape_string($link,$username)."', 
            '".md5($password)."', 123, '".$email."', 0, 0)");
    }

    function dangNhap($link, $username, $password){ //username nhap vao ko dc chua ki tu dac biet
        $result = chayTruyVanTraVeDL($link, 
        "SELECT COUNT(*) FROM tbl_user WHERE 
        taikhoan = '".mysqli_real_escape_string($link,$username)."'
        AND matkhau = '".md5($password)."'");

        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        if($row[0] > 0){
            $_SESSION['khach'] = $username;
            return true;
        }
        else return false;
    }
    function GetListUser(){
        $link = null;
        taoKetNoi($link);
        $re = chayTruyVanTraVeDL($link, "select * from tbl_user");
    
        $data = array();
        while ($rows = mysqli_fetch_assoc($re)){
            
            $lc = new user($rows['id_user'],$rows['tenuser'],$rows['taikhoan'],$rows['matkhau'],$rows['sdt'],$rows['email']);
            array_push($data,$lc);
            
        }
        giaiPhongBoNho($link,$re);
        return $data;
    
    }
   function GetUserTheoUserName($username){   
    $toanbo = GetListUser();
    foreach($toanbo as $user){
        if(trim($user -> GetTaiKhoan()) == trim($username)){
            return $user;
        }           
    } 
    return null;
   }

    function dangXuat(){
        if(isset($_SESSION['khach'])){
            unset($_SESSION['khach']);
            return true;
        }
        else return false;
    }
    function AddNewUS($user){
        $link = null;
        taoKetNoi($link);
        $re = chayTruyVanKhongTraVeDL( $link, "UPDATE tbl_user
                SET tenuser = ".$user -> GetTenUS()." taikhoan = ".$user -> GetTaiKhoan()." sdt = ".$user -> GetSDT()." email = ".$user -> GetEmail()."");
        if($re){
            return true;
        }
        else{
            return false;
        };
    }


?>