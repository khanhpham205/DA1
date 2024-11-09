<?php
ob_start();
session_start();
include_once('controllers/adminController.php');
include_once('controllers/pageController.php');
$pageC = new PageController;

$page = (isset($_GET['page'])) ? $_GET['page']: null;

switch($page){
    case 'home':
        $pageC->home();
        break;
    case 'account':
        if($_SESSION['user']){
            $pageC->account($_SESSION['user']);
        }else{
            $pageC->register();
        }
        break;
    default:
        $pageC->home();
}
if($_SESSION['role']==1){
    header('Location: admin');
    // session_unset();
    echo $_SESSION['role'];
}
