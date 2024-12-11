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

    function filterbymonth($e){
        $billdate = date($e['NgayTaoDon']);
        $currentmonth = new DateTime();
        return date('m', strtotime($billdate)) == $currentmonth->format('m');
    }


    function getAllDonhangSuccess(){
        $donhangtc = array_filter(PDO_query("SELECT * FROM donhang where `status` = 'giaohangthanhcong' "), 'filterbymonth');     
        $thunhap=0;
        $slsp=0;
        
        foreach($donhangtc as $donhang){
            $cartitems = PDO_query("
                SELECT sanpham.id_sanpham, sanpham.ten_sanpham, sanpham.gia_sanpham, sanpham.giamgia, option.tieude_option, option_contents.noidung, soluong
                FROM `cart_item` INNER JOIN 
                `option_contents` on `cart_item`.id_option       = `option_contents`.`id_optioncontents` INNER JOIN
                `option`          on `option_contents`.id_option = `option`.id_option INNER JOIN
                `sanpham` 	      on `option`.id_sanpham        = `sanpham`.id_sanpham
                where id_donhang = :iddonhang
                order by id_carditem desc",[
                    'iddonhang'=>$donhang['id_donhang']
                ]
            );
            foreach($cartitems as $i){
                $thunhap += $i['gia_sanpham']*(1-($i['giamgia'])/100);
                $slsp += $i['soluong'];
            }

        }
        return ['thuNhap'=>$thunhap,'spdaban'=>$slsp];
    }

    function getInfoForChart(){
        $donhangthanhcong = PDO_query("SELECT * FROM donhang where `status` = 'giaohangthanhcong'  order by NgayTaoDon desc");
        $donhanghuy = PDO_query("SELECT * FROM donhang where `status` = 'huydonhang'  order by NgayTaoDon desc");

        $tc1 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m');
        }));
        $tc2 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-1 month'));
        }));
        $tc3 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-2 month'));
        }));
        $tc4 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-3 month'));
        }));
        $tc5 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-4 month'));
        }));
        $tc6 = count(array_filter($donhangthanhcong,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-5 month'));
        }));


        $hu1 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m');
        }));
        $hu2 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-1 month'));
        }));
        $hu3 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-2 month'));
        }));
        $hu4 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-3 month'));
        }));
        $hu5 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-4 month'));
        }));
        $hu6 = count(array_filter($donhanghuy,function($i){
            $billdate = date($i['NgayTaoDon']);
            return date('Y-m', strtotime($billdate)) == date('Y-m',strtotime('-5 month'));
        }));

        return [
            'date'=>[
                date('Y-m',strtotime('-5 month')),
                date('Y-m',strtotime('-4 month')),
                date('Y-m',strtotime('-3 month')),
                date('Y-m',strtotime('-2 month')),
                date('Y-m',strtotime('-1 month')),
                date('Y-m')
            ],
            'thanhcong'=>[$tc6,$tc5,$tc4,$tc3,$tc2,$tc1],
            'huy'      =>[$hu6,$hu5,$hu4,$hu3,$hu2,$hu1]
        ];
    }
  
  
  
  
?>