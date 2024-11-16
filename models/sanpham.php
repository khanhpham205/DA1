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
    $check = PDO_query("SELECT * From cart_item
        where id_user = :id_user and id_option = :id_option
     ",
    ['id_user' => $id_user,'id_option' => $option]);
    // echo json_encode($check,JSON_FORCE_OBJECT);
    if(!$check){
        // ko co 
        PDO_execute("INSERT INTO cart_item(id_user,soluong,id_option) 
        value(:user, :sl, :op)",
        ['user'=>$id_user,'sl'=>$sl,'op'=>$option]);
        return 1;
    }
    else if(count($check)>0){
        PDO_execute("UPDATE  cart_item Set soluong = soluong + {$sl} 
        where id_user = :id_user and id_option = :id_option",
        ['id_user' => $id_user,'id_option' => $option]);
        return 1;
    }
    
    
    return $check;

}