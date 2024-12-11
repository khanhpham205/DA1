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

        if(isset($_POST['updatadonhangstatus'])){
            updataTrangThaiDonHang($_POST['iddonhang'],$_POST['updatadonhangstatus']);
        }






        $allPd = getAllProduct();
        $allDm = getAllDm();
        $allHang = getAllHang();
        $allDonHang = getAllDonHang();

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
            if(isset($_POST['adddanhmuc']) && $_POST['adddanhmuc']){
                switch(adminAddDm($_POST)){
                    case 0 : 
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&warning=danh muc da ton tai");
                        break;
                    case 1 : 
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&success=them danh muc thanh cong");
                        break;
                    default:
                        header("Refresh:0; url=?page=admin_edit&type=danhmuc&warning=them danh muc that bai");
                };
            }
            if(isset($_POST['addhang']) && $_POST['addhang']){
                switch(adminAddHang($_POST)){
                    case 0 : 
                        header("Refresh:0; url=?page=admin_edit&type=hang&warning=hang da ton tai");
                        break;
                    case 1 : 
                        header("Refresh:0; url=?page=admin_edit&type=hang&success=them danh muc thanh cong");
                        break;
                    default:
                        header("Refresh:0; url=?page=admin_edit&type=hang&warning=them danh muc that bai");
                };
            }
        }else{
            //edit
            if(isset($_POST['editproduct']) && $_POST['editproduct']){
                adminEditProduct($_POST);
            }else if(isset($_POST['edithang']) && $_POST['edithang']){
                adminEditHang($_POST);
            }else if(isset($_POST['editdanhmuc']) && $_POST['editdanhmuc']){
                adminEditDm($_POST);
            }
            switch ($type) {
                case 'sanpham':
                    $item = adminGetdProductToEdit($id);
                    break;
                case 'danhmuc':
                    $item = getDanhmucById($id);
                    break;
                case 'hang':
                    $item = getHangById($id);
                    break;
                default:
                    $item=null;
                    header("Refresh:0; url=?page=admin");
                    break;
            }
        }

        include_once('views/ADMIN_edit.php');
    }
}