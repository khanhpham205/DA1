<?php
ob_start();
include_once('models/sanpham.php');
include_once('models/danhmuc.php');
include_once('models/hang.php');
include_once('controllers/pageController.php');

$page = (isset($_GET['page'])) ? $_GET['page']: null;
$pageC = new PageController;
switch($page){
    case 'home':
        
        $pageC->home();
        break;
    default:
        $pageC->home();
}

?>