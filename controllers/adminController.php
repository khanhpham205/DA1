<?php
include_once('models/sanpham.php');
include_once('models/user.php');
include_once('models/danhmuc.php');
class AdminController{
    function home($iduser){
        // var_dump(checkAdminUser($iduser)!=1);
        if(!checkAdminUser($iduser)){
            header("Refresh:0; url=index.php");
        }
        include_once('views/ADMIN_page.php');
    }
}