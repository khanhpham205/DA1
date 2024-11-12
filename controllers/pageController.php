<?php
include_once('models/sanpham.php');
include_once('models/user.php');
include_once('models/danhmuc.php');
class PageController{
    public function home(){
        $newSp=getNewProduct();
        include_once('views/home.php');
    }
    public function account($id){
        $user = getUserById($id);
        if(isset($_POST['logout'])){
            logout();
            header("Refresh:0; url=index.php?page=account");
        }
        include_once('views/account.php');
    }

    public function register(){
        if(isset($_POST['login'])&&$_POST['login']){
            // danh nhap
            $lomail=$_POST['login_mail'];
            $lopass=$_POST['login_password'];
            $usersession = login($lomail,$lopass);
            // var_dump($usersession);
            if($usersession){
                // header('location: index.php');
                echo"<script>window.location.href='index.php'</script>";
            }else{
                //danh nhap thai bai
                // echo"<script> alert('Ten dang nhap hoac mat khau khong ton tai')</script>";
            }
        }
        include_once('views/register.php');
    }
    
    public function spDetail($idsp){
        $option = getOpsProById($idsp);
        $sp = getProductById($idsp);
        include_once('views/PdDetail.php');
    }
}