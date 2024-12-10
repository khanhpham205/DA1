<style>
    #giohang{
        >h1,h2,h3,h4,h5,h6{
            margin: 10px;
        }
        >.col10{
            width: 100%;
            /* height: 100px; */
            display: grid;
            grid-template-columns: repeat(10,80px);
            gap: 20px;
            justify-content: center;
        }
        .cart_items{
            user-select: none;
            grid-column: 1/7;
            >.item{
                box-shadow: 0 0 5px black;
                margin: 10px;
                border-radius: 10px;
                display: grid;
                grid-template-columns: 10% 20% 53% 7% 10%;
                
                grid-auto-columns: max-content;
                input[type=checkbox]{
                    align-self: center;

                    grid-row: span 2;
                    width: 25%;
                    aspect-ratio: 1/1;
                }
                img{
                    align-self: center;
                    grid-row: span 2;
                    width: 100%;
                    aspect-ratio: 1/1;
                }
                .pd_name{
                    user-select: text;
                    text-align: start ;
                    align-self: start;
                    grid-column: span 2;
                    >h1,h2,h3,h4,h5,h6{
                        margin: 5px;
                    }
                    p{
                        font-size: 12px;
                        color: grey;
                        margin: 5px;
                    }
                }
                >.pricetag{
                    user-select: text;

                    justify-self: start;
                    align-self: end;
                    margin: 5px;
                    text-align: start;
                    font-size: 15px;
                    vertical-align: bottom;
                }
                i{
                    color: red;
                    cursor: pointer;
                    margin: 10px;
                }
                .sl{
                    position: relative;
                    grid-column: span 2;
                    align-self: end;
                
                    margin: 0 10px 10px 0;
                    width: 100%;
                    display: flex;
                    width: 90px;
                    height: 30px;
                    border-radius: 100vh;
                    justify-content: space-between;
                    box-shadow: 0 0 5px black;
                    div {
                        background-color: white;
                        height: 100%;
                        aspect-ratio: 1/1;
                        border-radius: 50%;
                        text-align: center;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        cursor: pointer;
                        user-select: none;
                        border: none;
                        z-index: 1;
                        
                    }
                    input {
                        position: absolute;
                        top: 0;
                        bottom: 0;
                        width: 100%;
                        left: 0;
                        right: 0;
                        margin: 0;
                        border: none;
                        text-align: center;
                        z-index: 0;
                        border-radius: 100vh;
                    }
                    input::-webkit-outer-spin-button,
                    input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    }
                    
                }
            }
        }
        .bill{
            border-radius: 20px;
            background-color: rgba(255,255,255,.9);
            grid-column: span 4 ;
            margin: 5px;
            display: grid;
            grid-template-columns: 90%;
            gap: 10px;
            /* grid-template-rows: ; */
            grid-auto-rows: min-content;
            justify-content: center ;
            .bill_name{
                margin: 0;
                padding-bottom: 10px;
                border-bottom: 1px solid black;
            }
            
            .bill_info{
                display: grid;
                grid-template-columns: 50% 50%;
                width: 100%;
                /* justify-content: center; */
                /* align-content: start; */
                .bill_items_list{
                    grid-column:1/3 ;
                    min-height: 100px;
                    border-bottom:1px solid black;
                    .bill_items{
                        display: grid;
                        grid-template-columns: 50% 45%;
                        grid-template-rows:  45% 45%;
                        gap: 5px;
                        width: 90%;
                        justify-self: center;
                        justify-content: center;
                        margin-bottom: 12px;
                        .bill_items_name{
                            text-align: start;
                            grid-column: 1/3;
                            width: 100%;
                            padding:0;
                            margin:0;
                        }
                        .bill_items_sl{
                            grid-column: 2/3;
                            grid-row: 2/3;
                            align-self: end;
                            text-align: end;
                            font-size: 70%;

                            .pricetag{
                                align-self: end;
                                text-align: end;
                                width: 100%;
                            }
                        }
                        .bill_items_option{
                            color: grey;
                            font-size: 80%;
                            align-self: end;
                            text-align: start;
                            width: 100%;
                        }
                    }
                    .bill_items:not(:last-child):after{
                        content:"";
                        grid-column: 1/3 ;
                        display: block;
                        border-bottom: 1px solid grey;
                    }
                }
                >.titletag{
                    margin: 2px 0;
                    text-align:start;
                    grid-column: 1/2;
                }
                >.contenttag{
                    text-align:end;
                    margin: 2px 0;
                    grid-column: 2/3;
                }
                label{
                    grid-column: 1/3 ;
                    text-align: start;
                }
                #address{
                    width: 100%;
                    text-align: center;
                    grid-column: 1/3 ;
                }
                #giacuoicung{
                    color:red;
                    font-size: 13px;
                }
                #btn_thanhtoan{
                    grid-column:1/3 ;
                    width: 100%;
                    background-color: #FF794C;
                    border-radius: 100vh;
                    color: White;
                    font-size: 15px;
                    padding: 4px 0;
                    border:none;
                    border: solid 2px #FF794C;
                }
                #btn_thanhtoan:hover{
                    background:none;
                    border: solid 2px #FF794C;

                    color: #FF794C;
                }
            }
        }
        >div{
            text-align: center;
        }
    }
</style>

<div id="giohang" >
    <h1 style="text-align:start;">Giỏ Hàng Của Bạn</h1>
    <div class="col10">
        <div class="cart_items">
            <?php
            foreach($cart as $cartitemm){
                $giasp = number_format($cartitemm['gia_sanpham']);
                if($cartitemm['giamgia']){
                    $giaspgiam = number_format($cartitemm['gia_sanpham']*(1-($cartitemm['giamgia'])/100));
                    $giasp = $giaspgiam.'đ <del>'.$giasp.'đ</del>';
                }
                echo "
                    <div class='item'>
                        <input type='checkbox' class='checkinput' data-id='{$cartitemm['id_carditem']}' name=''>
                        <img src='contents/imgs/products/{$cartitemm['img']}'>
                        <div class='pd_name'>
                            <h5>{$cartitemm['ten_sanpham']}</h5>
                            <p>{$cartitemm['tieude_option']}:{$cartitemm['noidung']}</p>
                        </div>
                        <form method='POST'>
                            <i class='fa-regular fa-trash-can' onclick='this.parentElement.submit()'></i>
                            <input type='number' name='deletecart' hidden value='{$cartitemm['id_carditem']}'>
                        </form>
                        <p class='pricetag'>{$giasp}</p>
                        <form class='sl' method='POST'>
                            <div onmousedown='this.parentElement.children[1].stepUp(-1 );' onmouseup='this.parentElement.submit()'>-</div>
                            <input type='number' min='1' id='sluo' name='soluong' max='99' onchange='this.parentElement.submit()' oninput='validity.valid||(value=1);' value='{$cartitemm['soluong']}'>
                            <div onmousedown='this.parentElement.children[1].stepUp( 1 );' onmouseup='this.parentElement.submit()'>+</div>
                            <input type='number' name='cartid' hidden value='{$cartitemm['id_carditem']}'>
                        </form>
                        <div class='bill_items' hidden>
                            <input type='text' name='donmua[]' value='{$cartitemm['id_carditem']}' hidden>
                            <h5 class='bill_items_name'>{$cartitemm['ten_sanpham']}</h5>
                            <p class='bill_items_option' >{$cartitemm['tieude_option']}:{$cartitemm['noidung']}</p>
                            <p class='bill_items_sl' data-cost='{$cartitemm['soluong']},{$cartitemm['gia_sanpham']},{$cartitemm['giamgia']}' >{$cartitemm['soluong']} x <span class='pricetag'>{$giasp}</span></p>
                        </div>
                    </div>
                ";
            } 
            ?>
        </div>
        <div class="bill">
            <h3 class="bill_name">Chọn Mua</h3>
            <form class="bill_info" id="muahang" method="POST">
                <div class="bill_items_list">

                </div>
                <h5 class="titletag">Tổng giá niên yết:</h5>
                <h6 class="contenttag" >0</h6>
                <h5 class="titletag">Khuyến Mãi:</h5>
                <h6 class="contenttag">0</h6>
                <h5 class="titletag">Tổng thành tiền:</h5>
                <h6 class="contenttag" id='giacuoicung' >0</h6>
                <h5 class="titletag">Địa chỉ nhận hàng:</h5>
                <h6 class="contenttag" ><?php echo($address);?> </h6>
                <button name="thanhtoan" id="btn_thanhtoan" value="<?php echo $idUserForCard;?>">Mua hàng</button>
            </form>
        </div>
    </div>
</div>
<script>
    function changeSL(){
        // document.getElementById('sluo').parentElement.submit();
    }
    var allcartitems = [...document.querySelectorAll('.checkinput')];
    var bill = document.querySelector('.bill_items_list');

    allcartitems.forEach(element=>{
        element.addEventListener('change',e=>{
            const info = [...e.target.parentElement.children].at(-1);
            if(e.target.checked){
                // checked
                const tmpinfo = info.cloneNode(true);
                tmpinfo.hidden=false;
                bill.append(tmpinfo);
            }
            else{
                // not checked
                let listbillitems = [...bill.children];
                const itm = listbillitems.filter(e=> e.children[0].value == info.children[0].value)
                bill.removeChild(itm[0]);
            }
            //load thanh tien moi
            loadcostbillinfo()
        })
    })
    function loadcostbillinfo(){
        const infocostbill = document.querySelectorAll('.contenttag');
        console.log(infocostbill);
        let tonghanghoa = 0;
        let discount    = 0;

        [...bill.children].forEach(e=>{
            const data = e.children[3].dataset.cost.split(',');
            tonghanghoa += Number(data[0]) * Number(data[1]);
            discount += Number(data[0]) * (Number(data[1]) * (Number(data[2]))/100 ) ;            
        })
        infocostbill[0].innerHTML = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND'}).format(tonghanghoa);
        infocostbill[1].innerHTML = `- ${Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND'}).format(discount)}`;
        infocostbill[2].innerHTML = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND'}).format(tonghanghoa-discount);
    }
    loadcostbillinfo()
</script>