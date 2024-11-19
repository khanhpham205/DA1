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
            if($usersession){
                header('Location: index.php');
            }else{
                //danh nhap thai bai
                // echo"<script> alert('Ten dang nhap hoac mat khau khong ton tai')</script>";
            }
        }
        if(isset($_POST['register']) && $_POST['register']){
            // danh ky
            $rename=$_POST['rename'];
            $reemail=$_POST['reemail'];
            $rephonenumber=$_POST['rephonenumber'];
            $repassword=$_POST['repassword'];
            switch(register($rename,$reemail,$rephonenumber,$repassword)){
                case -1 :
                    header("Refresh:0; url=index.php?page=account&error=sai dinh dang");
                    break;
                case 0 : 
                    header("Refresh:0; url=index.php?page=account&warning=gmail hoac so dien thoai da ton tai");
                    break;
                case 1 : 
                    header("Refresh:0; url=index.php?page=account&success=dang ky tai khoan thanh cong");
                break;
                default:
                    header("Refresh:0; url=index.php?page=account&success=dang ky tai khoan thanh cong");

            }
        }
        include_once('views/register.php');
    }
    
    public function spDetail($idsp){
        $option = getOpsProById($idsp);
        $sp = getProductById($idsp);
        if(isset($_POST['addtocart']) && $_POST['addtocart']){
            $id_option = (int)$_POST['option'];
            $sl = (int)$_POST['soluong'];
            $id_sanpham = (int)$_POST['addtocart'];
            if(isset($_SESSION['user']) && $_SESSION['user']){
                $id_user = (int)$_SESSION['user'];
            }else{
                header("Refresh:0; url=?page=account");
            }

            switch(addToCart($id_sanpham,$sl,$id_option,$id_user)){
                case 1:
                    header("Refresh:0; url=?page=product&id={$id_sanpham}&success= them san pham thanh cong");
                    break;
                case 0:
                    header("Refresh:0; url=?page=product&id={$id_sanpham}&warning= them san pham that bai");
                    break;


        }
        include_once('views/PdDetail.php');
        }
    }
}