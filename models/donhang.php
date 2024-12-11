<?php
    include_once('pdo.php');
    function getallbillbyuser($id){
        $re=[];
        $bills = PDO_query("
            SELECT * 
            from donhang 
            where id_user=:id",[
            'id'=>$id
        ]);
        foreach($bills as $billitems){
            $cartitems = PDO_query("
                SELECT  soluong ,option_contents.noidung,option.tieude_option, sanpham.ten_sanpham, sanpham.giamgia, sanpham.gia_sanpham  
                FROM `cart_item` INNER JOIN 
                `option_contents` on `cart_item`.id_option       = `option_contents`.`id_optioncontents` INNER JOIN
                `option`          on `option_contents`.id_option = `option`.id_option INNER JOIN
                `sanpham` 	      on `option`.id_sanpham        = `sanpham`.id_sanpham
                where id_user = :id and id_donhang = :iddonhang
                order by id_carditem desc",[
                    'id'=>$id,
                    'iddonhang'=>$billitems['id_donhang']
                ]
            );
            // array_push($cartitems,$sp);
            $billitems['cart_items']=$cartitems;
            array_push($re,$billitems);
        }
        
        return $re;
    }
    function addDonHang($info,$iduser){
        $check = PDO_query("SELECT * FROM user where id_user = :id",[
            'id'=>$iduser
        ])[0]['address'];
        if($check =='' || $check == null){
            return 0;
        }
        else{
            $donhang = PDO_execute("INSERT INTO donhang( id_user,`status`)
            value  (:id_user,'choxacnhan')",[
                'id_user'=>$iduser
            ]);
            foreach($info as $cartitems){
                PDO_execute("UPDATE cart_item 
                set id_donhang= :id_donhang
                where id_carditem = :id_carditem",[
                    'id_donhang'=>$donhang,
                    'id_carditem'=>$cartitems
                ]);
            }
            return 1;
        }
    }
    // choxacnhan
    // chogiaohang
    // giaohangthanhcong
    // huydonhang
    function huyDonHang($id){
        $check = PDO_query("SELECT * From donhang where id_donhang = :id",['id'=>$id])[0];
        if($check['status']=='choxacnhan'){
            PDO_execute("UPDATE donhang set `status` = 'huydonhang' where id_donhang = :id",['id'=>$id]);
            return 1;
        }
        return 0;
    }

    function getAllDonHang(){
        $re=[];
        $tonggia=0;
        $alldonhang = PDO_query("SELECT * FROM donhang");
        // $info=$alldonhang;
        foreach($alldonhang as $donhang){
            //lay thong tin user
            $user = PDO_query("SELECT ten_user, phonenumber, `address` from user where id_user = :idus",['idus'=>$donhang['id_user']])[0];
            $donhang['user']=$user;
            //lay thong tin don hang
            $cartitems = PDO_query("
                SELECT sanpham.id_sanpham, sanpham.ten_sanpham, sanpham.gia_sanpham, sanpham.giamgia, option.tieude_option, option_contents.noidung, soluong
                FROM `cart_item` INNER JOIN 
                `option_contents` on `cart_item`.id_option       = `option_contents`.`id_optioncontents` INNER JOIN
                `option`          on `option_contents`.id_option = `option`.id_option INNER JOIN
                `sanpham` 	      on `option`.id_sanpham        = `sanpham`.id_sanpham
                where id_user = :id and id_donhang = :iddonhang
                order by id_carditem desc",[
                    'id'=>$donhang['id_user'],
                    'iddonhang'=>$donhang['id_donhang']
                ]
            );
            $donhang['donhangItemsList']=$cartitems;           
            
            

            //cap nhat thong tin vao json cuoi cung de return
            array_push($re,$donhang);
        }
        return $re;
    }
  
    function updataTrangThaiDonHang($id,$status){
        PDO_execute("UPDATE donhang set `status` = :tt where id_donhang = :iddh",[
            'tt'=>$status,
            'iddh'=>$id
        ]);
    }
  
  
  
  
?>