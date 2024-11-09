<?php
include_once('models/sanpham.php');
class PageController{
    public function home(){
        $allSp=getAllProduct();
        // $titlepage="store";
        include_once('views/home.php');
    }
}