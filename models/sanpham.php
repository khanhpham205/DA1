<?php
include_once('pdo.php');
function getAllProduct(){
    return PDO_query("
        SELECT * FROM sanpham
    ");
}
function getProductImg($idpro){
    $img = PDO_query("
        SELECT * from img
        where id_sanpham = :idsanpham
    ",['idsanpham'=>$idpro]);
}
function getNewProduct(){
    $sp = PDO_query("
        SELECT * FROM sanpham
        ORDER BY ngaydang;
    ");
    foreach($sp as $item){
        echo $item;
    }
    return $sp;
}

function getDiscountProduct(){
    return PDO_query("
        SELECT * FROM sanpham
    ");
}
