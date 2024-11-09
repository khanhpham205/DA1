<?php
    include_once('pdo.php');

    function getAllProduct(){
        return PDO_query("select * 
            from sanpham"
        );
    }