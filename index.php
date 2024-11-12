<?php
ob_start();
session_start();
include_once('controllers/adminController.php');
include_once('controllers/pageController.php');
$pageC = new PageController;
$pageA = new AdminController;

include_once('views/conponant_navbar.php');

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
    case 'product':
        if(isset($_GET['id'])){
            $pageC->spDetail($_GET['id']);
        }else{
            header("Refresh:0; url=index.php");
        }
        break;
    case 'admin':
        $pageA->home($_SESSION['user']);
        break;
    default:
        $pageC->home();
    }

