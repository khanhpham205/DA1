<?php
ob_start();
include_once('./controllers/pageController.php');
$pageC = new PageController;

$page = (isset($_GET['page'])) ? $_GET['page']: null;
switch($page){
    case 'home':

        // include_once('../views/home.php');
        $pageC->home();
        break;
    default:
        $pageC->home();
        // include_once('../views/home.php');
}
