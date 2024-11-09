<?php
include_once('models/sanpham.php');
class PageController{
    public function home(){
        $newSp=getNewProduct();
        include_once('views/home.php');
    }
}