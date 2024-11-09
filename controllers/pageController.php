<?php
include_once('models/sanpham.php');
class PageController{
    public function home(){
        $newSp=getNewProduct();
        // $titlepage="store";
        include_once('views/home.php');
    }
}