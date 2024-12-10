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
        $donhang = PDO_execute("INSERT INTO 
        donhang( id_user,`status`)
        value  (:id_user,'choxacnhan')",[
            'id_user'=>$iduser
        ]);
        // $info
        foreach($info as $cartitems){
            PDO_execute("UPDATE cart_item 
            set id_donhang= :id_donhang
            where id_carditem = :id_carditem",[
                'id_donhang'=>$donhang,
                'id_carditem'=>$cartitems
            ]);
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
  
  
  
  
  
  
?>