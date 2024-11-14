<?php
include_once('models/sanpham.php');
include_once('models/user.php');
include_once('models/danhmuc.php');
class AdminController{
    function home($iduser){
        if(!checkAdminUser($iduser)){
            header("Refresh:0; url=index.php");
        }

        $allPd =getAllProduct();
        include_once('views/ADMIN_page.php');
    }
}