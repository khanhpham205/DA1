<?php
include_once('models/sanpham.php');
include_once('models/user.php');
include_once('models/danhmuc.php');
class PageController{
    public function home(){
        $newSp=getNewProduct();
        $discountSp =getDiscountProduct();
        include_once('views/home.php');
    }
    public function products(){
        $newSp=getNewProduct();
        $By = $_GET['shoptype'];
        $shopId = $_GET['shopId'];
        switch ($_GET['shoptype']) {
            case 'danhmuc':
                $shoptmp = getDanhmucById($_GET['shopId']);
                $tag=[
                    'name'    =>$shoptmp['ten_danhmuc'] ,
                    'content' =>$shoptmp['mota_danhmuc'],
                    'img'     =>$shoptmp['img']
                ];
                $listSp = getProductByIdDanhmuc($_GET['shopId']);
                break;
            case 'hang':
                $shoptmp = getHangById($_GET['shopId']);
                $tag=[
                    'name'    =>$shoptmp['ten_hang'] ,
                    'content' =>$shoptmp['mota_hang'],
                    'img'     =>$shoptmp['img']
                ];
                $listSp = getProductByIdHang($_GET['shopId']);
                break;
            case 'name':
                $tag=null;
                $listSp = getProductByName($_GET['shopId']);
                break;
            default:
                header("Refresh:0; url=?page=home");
                break;
        }
        include_once('views/shop.php');
    }
    public function account($id){
        if(isset($_POST['logout'])){
            logout();
            header("Refresh:0; url=index.php?page=account");
        }
        if (isset($_POST['doithongtin'])) {
            changeaccountinfo($_POST);
        }        
        $user = getUserById($id)[0];

        echo "<main class='col12'>";
        include_once('views/account.php');
        echo "<div class='user_contents'>";
    
        if(isset($_GET['tag'])){
            switch ($_GET['tag']) {
                case 'info': 
                    include('views/account_info.php');
                    break;
                case 'cart':
                    if(isset($_POST['soluong'])){
                        changeSLCart($_POST['cartid'],$_POST['soluong']);
                    }else if(isset($_POST['deletecart'])){
                        deleteCart($_POST['deletecart']);
                    }  
                    
                    
                    $cart = getAllCartItemsByUserId($id);
                    include('views/account_cart.php');
                    break;
                case 'bill':
                    include('views/account_bill.php');
                    break;
                default:
                    include('views/account_info.php');
                    break;
            }
        }else{
            header("Refresh:0; url=index.php?page=account&tag=info");
        }
        echo "</div></main>";
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
        $option   = getOpsProById($idsp);
        $sp       = getProductById($idsp);
        $likelyPd = getLikelyPd($idsp);
        if(isset($_POST['addtocart']) && $_POST['addtocart']){
            $id_option = (int)$_POST['option'];
            $sl = (int)$_POST['soluong'];
            $id_sanpham = (int)$_POST['addtocart'];
            if(!isset($_SESSION['user']) || $_SESSION['user']==null ){
                header("Refresh:0; url=?page=account");
            }else{
                $id_user = (int)$_SESSION['user'];
                if(addToCart($id_sanpham,$sl,$id_option,$id_user)){
                    header("Refresh:0; url=?page=product&id={$id_sanpham}&success= them san pham thanh cong");
                }else{
                    header("Refresh:0; url=?page=product&id={$id_sanpham}&warning= them san pham that bai");
                }
            }

        }
        include_once('views/PdDetail.php');
    }
}