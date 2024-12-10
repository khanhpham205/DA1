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
// cart 
function addToCart($idpro,$sl,$option,$id_user){
    if($id_user==null){
        return 0;
    }
    $check = PDO_query("SELECT * From cart_item
        where id_user = :id_user and id_option = :id_option and id_donhang is null
     ",
    ['id_user' => $id_user,'id_option' => $option]);
    if(!$check){
        // ko co 
        PDO_execute("INSERT INTO cart_item(id_user,soluong,id_option) 
        value(:user, :sl, :op)",
        ['user'=>$id_user,'sl'=>$sl,'op'=>$option]);
        return 1;
    }
    else if(count($check)>0){
        if($check[0]['soluong']+$sl >= 99){
            PDO_execute("UPDATE  cart_item Set soluong = 99
            where id_user = :id_user and id_option = :id_option",
            ['id_user' => $id_user,'id_option' => $option]);
            return 1;
        }
        PDO_execute("UPDATE  cart_item Set soluong = soluong + {$sl} 
        where id_user = :id_user and id_option = :id_option",
        ['id_user' => $id_user,'id_option' => $option]);
        return 1;
    }
    
    
    return $check;

}
function changeSLCart($idcart, $sl){
    PDO_execute("UPDATE cart_item set soluong = :sl where id_carditem=:id ",[
        'sl'=>(int)$sl,
        'id'=>(int)$idcart
    ]);
}
function deleteCart($idcart){
    PDO_execute("DELETE FROM cart_item where id_carditem=:id ",[
        'id'=>(int)$idcart
    ]);
}

// USER
function getAllCartItemsByUserId($id){
    // {
    //     "id_user": 1,
    //     "soluong": 1,
    //     "id_optioncontents":1 ,
    //     "noidung": "",
    //     "id_option": 14,
    //     "isDefault": 1,
    //     "tieude_option": "",
    //     "id_sanpham": 1,
    //     "id_hang": 1,
    //     "id_danhmuc":1 ,
    //     "ten_sanpham": "",
    //     "mota_sanpham": "",
    //     "ngaydang": "",
    //     "giamgia": 10,
    //     "gia_sanpham": 3850000,
    //     "img": ""
    // }

    $cartitem = PDO_query("SELECT id_carditem, id_user, soluong ,option_contents.*,option.tieude_option, sanpham.*  FROM `cart_item` INNER JOIN 
        `option_contents` on `cart_item`.id_option       = `option_contents`.`id_optioncontents` INNER JOIN
        `option`          on `option_contents`.id_option = `option`.id_option INNER JOIN
        `sanpham` 	      on `option`.id_sanpham        = `sanpham`.id_sanpham
        where id_user = :id and id_donhang is NULL
        order by id_carditem desc",[
            'id'=>$id
        ]
    );
    $re=[];
    foreach($cartitem as $itemm){
        $temp = $itemm;
        $img = getProductImgThumbnail($itemm['id_sanpham'])[0];
        // array_push($itemm,$img);
        $temp['img'] = $img['id_img'];
        array_push($re,$temp);
    }
    return $re;
}    
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

    for ($i = 1; $i <= (int)$info['numofoptions'] ; $i++) {
        $temp = ($i ==1)? 1:null;
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
            // var_dump($nametmp);
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

function adminEditProduct($info){
    // echo json_encode($info,JSON_FORCE_OBJECT);
    PDO_execute("UPDATE sanpham SET
        ten_sanpham  = :ten,
        mota_sanpham = :mota,
        giamgia      = :giamgia,
        gia_sanpham  = :gia,
        id_danhmuc   = :danhmuc,
        id_hang      = :hang
        WHERE id_sanpham =:id",[
            'id'       =>$info['id_sp'],
            'ten'      =>$info['ten_sp'],
            'mota'     =>$info['mota_sanpham'],
            'giamgia'  =>$info['giamgia_sp'],
            'gia'      =>$info['gia_sp'],
            'danhmuc'  =>$info['danhmuc'],
            'hang'     =>$info['hang'],
    ]);
    PDO_execute("UPDATE `option` SET
        tieude_option  = :ten
        WHERE id_option =:id",[
            'id'       =>$info['id_option'],
            'ten'      =>$info['optionname']
    ]); 

    $oldoptionctnts = PDO_query("SELECT * FROM option_contents where id_option = :id",[
        'id'=>$info['id_option']
    ]);

    for($i = 1; $i <= (int)$info['numofoptions'] ; $i++) {
        if($i <= count($oldoptionctnts)){
            //sua
            
            PDO_execute("UPDATE option_contents SET noidung =:noidung where id_optioncontents=:id",[
               'noidung'  => $info["option_item_name{$i}"], 
               'id'       => $info["id_optioncontents{$i}"]
            ]);
            
            if($_FILES["option_item_imgs{$i}"]['name'][0] !=''){
                PDO_execute("DELETE FROM img where id_optioncontents = :idoption",[
                    'idoption'=>$info["id_optioncontents{$i}"]
                ]);
                $tmpimgname ='tmp';
                //xoa anh cu
                $oldimgs=PDO_query("SELECT * FROM img WHERE id_optioncontents=:idop",[
                    'idop'=>$info["id_optioncontents{$i}"]
                ]);
                foreach($oldimgs as $imgite){
                    if(str_contains($imgite['id_img'],'tmp')){
                        $tmpimgname='';
                    }
                    unlink("./contents/imgs/products/{$imgite['id_img']}");
                }
                //them anh moi
                $imgs = reArrayFiles($_FILES["option_item_imgs{$i}"]);
                $a=1;
                for($imgnum = 0; $imgnum <= count($imgs)-1 ; $imgnum++){
                    $img = $imgs[$imgnum];
                    $nametmp = explode('.',$img['name']);
                    $nameimg = "Product_{$info['id_sp']}_{$info["id_optioncontents{$i}"]}__{$imgnum}_{$tmpimgname}.{$nametmp[1]}";

                    $post_img = PDO_execute("INSERT INTO 
                        img( id_img, id_sanpham, id_optioncontents, isDefault)value
                        (:id_img,:id_sanpham,:id_optioncontents,:isDefault)",[
                        'id_img'            => $nameimg,
                        'id_sanpham'        => $info['id_sp'],
                        'id_optioncontents' => $info["id_optioncontents{$i}"],
                        'isDefault'=> $a
                        ]
                    );
                    move_uploaded_file($img['tmp_name'],"./contents/imgs/products/{$nameimg}");
                    $a=null;
                }
            }
        }else{
            // them
            $postopctnts = PDO_execute("INSERT INTO 
                option_contents( noidung , id_option) 
                value          (:noidung ,:id_option)",[
                    'noidung'=>$info["option_item_name".$i],
                    'id_option'=>$info['id_option']
            ]);
            $imgs = reArrayFiles($_FILES["option_item_imgs{$i}"]);
            $a=1;
            for($imgnum = 0; $imgnum <= count($imgs)-1 ; $imgnum++){
                $img = $imgs[$imgnum];
                $nametmp = explode('.',$img['name']);
                var_dump($nametmp);
                $nameimg = "Product_{$info['id_sp']}_{$postopctnts}__{$imgnum}.{$nametmp[1]}";

                $post_img = PDO_execute("INSERT INTO 
                    img( id_img, id_sanpham, id_optioncontents, isDefault)value
                    (:id_img,:id_sanpham,:id_optioncontents,:isDefault)",[
                    'id_img'            => $nameimg,
                    'id_sanpham'        => $info['id_sp'],
                    'id_optioncontents' => $postopctnts,
                    'isDefault'=> $a
                    ]
                );
                move_uploaded_file($img['tmp_name'],"./contents/imgs/products/{$nameimg}");
                $a=null;
            }
        }
    }
}

function adminGetdProductToEdit($idsp){
    $sp = PDO_query("SELECT * FROM `sanpham` INNER JOIN
        `option`        on `option`.id_sanpham        = sanpham.id_sanpham
        where sanpham.id_sanpham =  :idsp;",[
            'idsp'=>$idsp
        ]
    )[0];
    $optioncontents = PDO_query("SELECT id_optioncontents, noidung FROM option_contents
        where id_option = :idoption",[
            'idoption'=>$sp['id_option']
    ]);
    $opcontss=[];
    
    foreach($optioncontents as $optionctns){
        $imgs=PDO_query("SELECT * FROM img where id_optioncontents=:id",['id'=>$optionctns['id_optioncontents']]);
        $optionctns['img']=$imgs;
        array_push($opcontss,$optionctns);
    }
    $sp['options']=$opcontss;
    // echo json_encode($sp,JSON_FORCE_OBJECT); 
    // echo json_encode($opcontss,JSON_FORCE_OBJECT); 
    return $sp;
}
function delProduct($idsp){
    $sp = PDO_execute("DELETE FROM sanpham where id_sanpham= :id",['id'=>$idsp]);
    $optionscontentsimg = PDO_query("SELECT * FROM option_contents where id_sanpham= :id",['id'=>$idsp]);
    foreach($optionscontentsimg as $opsimg){
        unlink($opsimg['id_img']);
    }
    // return $sp;
}
