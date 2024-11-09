<?php
    $page = (isset($_GET['page'])) ? $_GET['page']: null;
    switch($page){
        case 'home':
            include_once('../views/home.php');
            break;
        default:
            include_once('../views/home.php');
    }