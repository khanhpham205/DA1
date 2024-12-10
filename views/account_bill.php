<style>
    #donhang{
        .tags{
            display: flex;
            justify-content: center;
            li{
                cursor: pointer;
                user-select: none;
                text-decoration: none;
                list-style: none;
                margin: auto 10px ;
            }
            li.active{
                font-size: 110%;
                font-weight: bold;
                /* box-shadow: 0 0 5px grey; */
            }
            li.active + .content_tags{
                display: block;

            }
        }
        .content_tags{
            display: none;
        }
        .content_tags.active{
            display: block;
            justify-content: center;
        }
        .bill_item{
            margin: 10px auto ;
            justify-self: center;
            width: 95%;
            padding: 10px ;
            padding: auto 10px !important;
            display: grid;
            grid-template-columns: 70% 30%;
            gap: 5px;
            justify-content: center;
            border-radius:10px ;
            background-color: white;

            .bill_itms_card{
                width: 90%;
                /* justify-self:center ; */
                display: grid;
                grid-template-columns: 50% 50%;
                margin-bottom: 5px ;
                h1,h2,h3,h4,h5,h6{
                    grid-column: 1/3 ;
                }
                p.op{
                    color: grey;
                    font-size: 13px;
                }
                p.pricetag{
                    justify-self: end ;
                    font-size: 13px;
                }
            }
            }
            .bill_itms_card:not(:last-child):after{
                content:"";
                grid-column: 1/3 ;
                /* width: 80%; */
                justify-content: center ;
                display: block;
                border-bottom: 1px solid grey;
            }

            .bill_info{
                display:grid;
                grid-template-columns: 50% 50%;
                justify-content: center; 

                .titletag{
                    margin: 2px 0;
                    text-align:start;
                    grid-column: 1/2;
                }
                .contenttag{
                    text-align:end;
                    margin: 2px 0;
                    grid-column: 2/3;
                }
            }
            .btn_huy{
                grid-column: 2/3;
                button{
                    width: 100%;
                    background-color: red;
                    color: white;
                    border:red 2px solid;
                    border-radius: 100vh;
                    padding: 3px ;
                    font-size:13px ;
                }
                button:hover{
                    background: none;
                    color: red;
                    border:red 2px solid;
                }
            }
        }

</style>

<div id="donhang">
    <h1>Đơn hàng </h1>
    <div class="tags">
        <li class="active" data-tag="all" >Tất cả đơn hàng</li>
        <li data-tag="verifying"  >Chờ xác nhận</li>
        <li data-tag="delivering" >Chờ giao hàng</li>
        <li data-tag="success"    >Giao hàng thành công</li>
        <li data-tag="canceled"   >Đã Hủy</li>
    </div>
    <hr>
    <?php
        function verifying($e){return $e['status'] == 'choxacnhan';}
        function delivering($e){return $e['status'] == 'chogiaohang';}
        function success($e){return $e['status'] == 'giaohangthanhcong';}
        function canceled($e){return $e['status'] == 'huydonhang';}
        $verifying = array_filter($data,'verifying');
        $delivering = array_filter($data,'delivering');
        $success = array_filter($data,'success');
        $canceled = array_filter($data,'canceled');    
    ?>
    <div class="content_tags active" id="all">
        <?php
            function loadddddddd($data,$address){

            foreach($data as $item){
                switch ($item['status']) {
                    case 'choxacnhan':
                        $status = 'Chờ xác nhận';
                        break;
                    case 'chogiaohang':
                        $status = 'Chờ giao hàng';
                        break;
                    case 'giaohangthanhcong':
                        $status = 'Giao hàng thành công';
                        break;
                    case 'huydonhang':
                        $status = 'Đã hủy đơn hàng';
                        break;
                }

                $tonghanghoa=0;
                $tonggiamgia=0;
                $div = '';

                foreach($item['cart_items'] as $i){
                    $tonghanghoa += $i['gia_sanpham'] * $i['soluong'];
                    $tonggiamgia += ($i['gia_sanpham']/100) * $i['giamgia'] * $i['soluong'];
                    $giasp = number_format($i['gia_sanpham']).'đ';
                    if($i['giamgia']!=0){
                        $giaspgiam = number_format($i['gia_sanpham']*(1-($i['giamgia'])/100));
                        $giasp = $giaspgiam.'đ <del>'.$giasp.'</del>';
                    }
                    $div.="
                        <div class='bill_itms_card'>
                            <h4>{$i['ten_sanpham']}</h4>
                            <p class='op'>{$i['tieude_option']} : {$i['noidung']}</p>
                            <p class='pricetag'>{$giasp}</p>
                        </div>
                    ";
                }

                $a1 = number_format($tonghanghoa);
                $a2 = number_format($tonggiamgia);
                $a3 = number_format($tonghanghoa - $tonggiamgia);

                echo "
                    <div class='bill_item'>
                        <div class='bill_items'>
                            {$div}
                        </div>
                        <div class='bill_info'>
                            <h4 style='grid-column:1/3; text-align:center; color:#FF794C;'>{$status}</h4>
                            <h5 class='titletag'>Tổng giá niên yết:</h5>
                            <h6 class='contenttag'>{$a1}đ</h6>

                            <h5 class='titletag'>Khuyến Mãi:</h5>
                            <h6 class='contenttag'>- {$a2}đ</h6>

                            <h5 class='titletag'>Tổng thành tiền:</h5>
                            <h6 class='contenttag' id='giacuoicung' style='color:red;'>{$a3}đ</h6>

                            <h5 class='titletag'>Địa chỉ nhận hàng:</h5>
                            <h6 class='contenttag'>{$address}</h6>
                        </div>
                        <form method='POST' class='btn_huy'>
                        <button name='huydonhang' value='{$item['id_donhang']}' title='chỉ có thể hủy khi đơn hàng chưa được xác nhận'>Hủy Đơn Hàng</button>
                        </form>
                    </div>";
            }
            }
            loadddddddd($data,$address);
        ?>
        
    </div>
    <div class="content_tags" id="verifying">  
        <?php loadddddddd($verifying,$address);?>
    </div>
    <div class="content_tags" id="delivering"> 
        <?php loadddddddd($delivering,$address);?>
    </div>
    <div class="content_tags" id="success">  
        <?php loadddddddd($success,$address);?>
    </div>
    <div class="content_tags" id="canceled">
        <?php loadddddddd($canceled,$address);?>

    </div>
</div>


<script>
    [...document.querySelector('.tags').children].forEach(element=>{
        element.addEventListener('click',e=>{
            [...document.querySelectorAll('.content_tags')].forEach(e=>{
                [...document.querySelector('.tags').children].forEach(a=>{
                    a.classList.remove('active');
                })
                element.classList.add('active')
                e.classList.remove('active');
                if(e.id==element.dataset.tag){
                    e.classList.add('active');
                }
            })
        })
    })
</script>