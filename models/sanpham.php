<?php
include_once('pdo.php');
function getAllProduct(){
    $sp = [];
    foreach(PDO_query("SELECT * FROM sanpham") as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($sp,$item);
    }
    return $sp;
}
function getProductImg($idpro){
    $img = PDO_query("
        SELECT * from img
        where id_sanpham = :idsanpham
    ",['idsanpham'=>$idpro]);
    return $img;
}
function getProductById($idpro){
    $imgs = getProductImg($idpro);
    $sp= PDO_query("
        SELECT * FROM sanpham
        where id_sanpham = :id
    ",['id'=>$idpro])[0];
    $sp['imgs'] = $imgs;
    return $sp;
}

function getOpsProById($idpro){
    $op = PDO_query("
        SELECT * from option
        where id_sanpham = :idsp
    ",['idsp'=>$idpro]);
    foreach($op as &$option){
        $option['ops'] = PDO_query(
            "SELECT * from option_contents where id_option = :id",
            ['id'=>$option['id_option']]);
        foreach( $option['ops'] as &$imgadd ){
            $imgadd['img'] = PDO_query("
                SELECT id_img
                from img
                where id_optioncontents = :id_opct
            ",['id_opct'=>$imgadd['id_optioncontents']])[0];
        }
        // $option['ops']['img'] = PDO_query("
        //     SELECT id_img
        //     from img
        //     where
        // ");
    }
    return $op;
}

function getProductImgThumbnail($idpro){
    return PDO_query("
        SELECT * from img
        where id_sanpham = :idsanpham AND isDefault = 1 
    ",['idsanpham'=>$idpro]);
}
function getNewProduct(){
    $sp = [];
    foreach(PDO_query("SELECT * FROM sanpham ORDER BY ngaydang limit 8;") as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($sp,$item);
    }
    return $sp;
}
function addToCart($idpro,$sl,$option,$id_user){
    return 1;
}
// function getDiscountProduct(){
//     return PDO_query("
//         SELECT * FROM sanpham
//     ");
// }


// Cảm biến Pulsar XS-1 - 32000 DPI, 750 IPS, LOD thấp nhất 0.7mm 
// Switch quang học. Cuộn chuột Pulsar chống bụi.
// Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn 
// Hỗ trợ report rate 8000Hz nhờ MCU Nordic (dongle 8000Hz bán rời)