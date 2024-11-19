<?php
include_once('models/sanpham.php');
include_once('models/user.php');
include_once('models/danhmuc.php');
include_once('models/hang.php');
class AdminController{
    function home($iduser){
        if(!checkAdminUser($iduser)){
            header("Refresh:0; url=index.php");
        }
        $allPd = getAllProduct();
        $allDm = getAllProduct();
        ;
        include_once('views/ADMIN_page.php');
    }
    function edit($iduser,$type,$id){
        if(!checkAdminUser($iduser)){
            header("Refresh:0; url=index.php");
        } 
        if(!$id){
            // add san pham
            // header("Refresh:0; url=index.php?page=admin");
            $allDm = getAllDm();
            $allHang = getAllHang();
            if(isset($_POST['addproduct']) && $_POST['addproduct']){
                echo json_encode($_POST,JSON_FORCE_OBJECT);  
                var_dump($_POST['option_item_imgs']);
            }
        }
        include_once('views/ADMIN_edit.php');
    }
}