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
        $allDm = getAllDm();
        $allHang = getAllHang();
        if(!$id){
            //add
            if(isset($_POST['addproduct']) && $_POST['addproduct']){
                switch(adminAddProduct($_POST)){
                    case 0 : 
                        header("Refresh:0; url=?page=admin_edit&type=sanpham&warning=them san pham that bai");
                        break;
                    case 1 : 
                        header("Refresh:0; url=?page=admin_edit&type=sanpham&success=them san pham thanh cong");
                        break;
                    default:
                        header("Refresh:0; url=?page=admin_edit&type=sanpham&warning=them san pham that bai");
                } 
                ;
            }
            if(isset($_POST['addhang']) && $_POST['addhang']){
                switch(adminAddDm($_POST)){
                    case 0 : 
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&warning=them danh muc that bai");
                        break;
                    case 1 : 
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&success=them danh muc thanh cong");
                        break;
                    default:
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&warning=them danh muc that bai");
                } 
                ;
            }
            if(isset($_POST['adddanhmuc']) && $_POST['adddanhmuc']){
                switch(adminAddHang($_POST)){
                    case 0 : 
                        header("Refresh:0; url=?page=admin_edit&type=hang&warning=them danh muc that bai");
                        break;
                    case 1 : 
                        header("Refresh:0; url=?page=admin_edit&type=hang&success=them danh muc thanh cong");
                        break;
                    default:
                        header("Refresh:0; url=?page=admin_edit&type=hang&warning=them danh muc that bai");
                } 
                ;
            }
        }else{
            //edit
            if(isset($_POST['editproduct']) && $_POST['editproduct']){
                adminEditProduct($_POST);
            }
            $item = adminGetdProductToEdit($id);
        }

        include_once('views/ADMIN_edit.php');
    }
}