<?php
include_once('models/sanpham.php');
include_once('models/danhmuc.php');
include_once('models/hang.php');
// include_once('./models/sanp ham.php')
class PageController{
    public function home(){
        $allSp = getAllProduct();
        var_dump($allSp);
        include_once('views/home.php');
    }
}