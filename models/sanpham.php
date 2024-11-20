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
function getLikelyPd($idpro){
    $sp=getProductById($idpro);
    $sp_temp=PDO_query("SELECT * FROM sanpham where 
        id_danhmuc =:iddm and 
        id_sanpham != :idsp limit 4;",[
        'iddm' => $sp['id_danhmuc'],
        'idsp' => $sp['id_sanpham'],
    ]);
    $re= [];
    foreach( $sp_temp as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($re,$item);
    }
    return $re;
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
function getDiscountProduct(){
    $sp = [];
    foreach(PDO_query("SELECT * FROM sanpham ORDER BY giamgia DESC limit 8;") as $item){
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
function getProductByIdDanhmuc($id){
    $re = [];
    foreach(PDO_query("SELECT * FROM sanpham where id_danhmuc=:iddm;",['iddm'=>$id]) as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($re,$item);
    }
    return $re;
}
function getProduct(){
    $re = [];
    foreach(PDO_query("SELECT * FROM sanpham") as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($re,$item);
    }
    return $re;
}
function getProductByIdHang($id){
    $re = [];
    foreach(PDO_query("SELECT * FROM sanpham where id_hang=:idghng;",['idghng'=>$id]) as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($re,$item);
    }
    return $re;
}
function getProductByName($name){
    $re = [];
    foreach(PDO_query("SELECT * FROM sanpham where ten_sanpham like :ten",['ten'=>"%{$name}%"]) as $item){
        $imgs = getProductImgThumbnail($item['id_sanpham'])[0];
        array_push($item,$imgs);
        array_push($re,$item);
    }
    return $re;
}
// USER
// function getAllCartItemsByUserId($id){
    // $re=[];
    // $carts=PDO_query("SELECT id_sanpham, ten_sanpham,giamgia,gia, hang.ten_hang, danhmuc.ten_danhmuc from sanpham 
    //   INNER JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id_danhmuc
    //   INNER JOIN hang ON sanpham.id_hang=hang.id_hang
    // ");

    
//   }

//ADMIN CRUD
function adminAddProduct($info){
    $value = [
        "id_hang"      => $info['hang'],
        "id_danhmuc"   => $info['danhmuc'],
        "ten_sanpham"  => $info['ten_sp'],
        "mota_sanpham" => $info['mota_sanpham'],
        "giamgia"      => $info['giamgia_sp'],
        "gia_sanpham"  => $info['gia_sp'],
    ];
    $check = PDO_query("SELECT * FROM sanpham");
    $namecheck=str_replace(' ', '', $value['ten_sanpham']);
    foreach($check as $ck){
        if($namecheck === str_replace(' ', '', $ck['ten_sanpham'])){
            echo($namecheck.'<br>'.str_replace(' ', '', $ck['ten_sanpham']));
            return 0;
        }
    }
    $post_product = PDO_execute("INSERT INTO 
        sanpham( id_hang, id_danhmuc, ten_sanpham, mota_sanpham, giamgia, gia_sanpham)
        value  (:id_hang,:id_danhmuc,:ten_sanpham,:mota_sanpham,:giamgia,:gia_sanpham)"
    ,$value);
    $post_option = PDO_execute("INSERT INTO 
        option( tieude_option,id_sanpham)
        value ( :tieude_option,:id_sanpham)",[
        'tieude_option'  => $info['optionname'],
        'id_sanpham'     => $post_product
    ]);

    for ($i = 0; $i < (int)$info['numofoptions'] ; $i++) {
        $temp = ($i ==0)? 1:null;
        $nameOption= 'option_item_name'.$i;
        $imgOption= 'option_item_imgs'.$i;

        $post_option_item = PDO_execute("INSERT INTO 
            option_contents( noidung, id_option, isDefault)
            value          (:noidung,:id_option,:isDefault)",[
                'noidung'   => $info[$nameOption],
                'id_option' => $post_option,
                'isDefault' => $temp
            ]
        );
        
        $imgs = reArrayFiles($_FILES[$imgOption]);
        $a=1;
        for($imgnum = 0; $imgnum< count($imgs) ; $imgnum++){
            $img = $imgs[$imgnum];
            $nametmp = explode('.',$img['name']);
            var_dump($nametmp);
            $nameimg = "Product_{$post_product}_{$post_option_item}__{$imgnum}.{$nametmp[1]}";

            $post_img = PDO_execute("INSERT INTO 
                img( id_img, id_sanpham, id_optioncontents, isDefault)value
                   (:id_img,:id_sanpham,:id_optioncontents,:isDefault)",[
                'id_img'            => $nameimg,
                'id_sanpham'        => $post_product,
                'id_optioncontents' => $post_option_item,
                'isDefault'=> $a
                ]
            );
            move_uploaded_file($img['tmp_name'],"./contents/imgs/products/{$nameimg}");
            $a=null;

        }
        
    }
    return 1;

}