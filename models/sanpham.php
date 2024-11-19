<?php
include_once('pdo.php');
// chuyen doi $_files de nhin hon
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

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
// CRUD
function adminAddProduct($info){
    $value = [
        "id_hang"      => $info['hang'],
        "id_danhmuc"   => $info['danhmuc'],
        "ten_sanpham"  => $info['ten_sp'],
        "mota_sanpham" => $info['mota_sanpham'],
        "giamgia"      => $info['giamgia_sp'],
        "gia_sanpham"  => $info['gia_sp'],
    ];
    $post_product = PDO_execute("INSERT INTO 
        sanpham( id_hang, id_danhmuc, ten_sanpham, mota_sanpham, giamgia, gia_sanpham)
        value  (:id_hang,:id_danhmuc,:ten_sanpham,:mota_sanpham,:giamgia,:gia_sanpham)"
    ,$value);
    // $get_product = PDO_query("SELECT * from sanpham where   
    //     id_hang= :id_hang and
    //     id_danhmuc=:id_danhmuc and 
    //     ten_sanpham= :ten_sanpham and
    //     mota_sanpham= :mota_sanpham and
    //     giamgia= :giamgia and
    //     gia_sanpham=:gia_sanpham"
    // ,$value);
    // echo $post_product; 
    $post_option = PDO_execute("INSERT INTO 
        option( tieude_option,id_sanpham)
        value ( :tieude_option,:id_sanpham)",[
        'tieude_option'  => $info['optionname'],
        'id_sanpham'     => $post_product
    ]);
    
    // $get_option = PDO_query("SELECT * From option where 
    //     tieude_option = :tieude_option and
    //     id_sanpham = :id_sanpham",[
    //     'tieude_option'  => $info['optionname'],
    //     'id_sanpham'     =>$get_product['id_sanpham'],
    // ])[0];
    for ($i = 0; $i < (int)$info['numofoptions'] ; $i++) {
        $temp = ($i ==0)? 1:null;
        $nameOption= 'option_item_name'.$i;
        $imgOption= 'option_item_imgs'.$i;
        // var_dump($_FILES[$imgOption]);
        // echo json_encode($_FILES['option_item_imgs0'],JSON_FORCE_OBJECT);  

        $post_option_item = PDO_execute("INSERT INTO 
            option_contents( noidung, id_option, isDefault)
            value          (:noidung,:id_option,:isDefault)",[
                'noidung'   => $info[$nameOption],
                'id_option' => $post_option,
                'isDefault' => $temp
            ]
        );
        // $get_option_item = PDO_query("SELECT * FROM option_contents where
        //     noidung     = :noidung and
        //     id_option   = :id_option",[
        //     'noidung'   => $info[$nameOption],
        //     'id_option' => $get_option['id_option']
        // ])[0];
        
        $imgs = reArrayFiles($_FILES[$imgOption]);
        $a=1;
        foreach($imgs as $img){
            $post_img = PDO_execute("INSERT INTO 
                img( id_img, id_sanpham, id_optioncontents, isDefault)value
                   (:id_img,:id_sanpham,:id_optioncontents,:isDefault)",[
                'id_img'            => $img['name'],
                'id_sanpham'        => $post_product,
                'id_optioncontents' => $post_option_item,
                'isDefault'=> $a
                ]
            );
            $a=null;
            move_uploaded_file($img['tmp_name'],"./contents/imgs/products/{$img['name']}");
        }
        
    }

}