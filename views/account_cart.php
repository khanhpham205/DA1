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
                grid-column: span 4 ;
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
                        <input type='checkbox' name=''>
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
                    </div>
                ";
            }
              
            ?>
        </div>
        <div class="bill">
            <h3>Chọn Mua</h3>
        </div>
    </div>
</div>
<script>
    function changeSL(){
        // document.getElementById('sluo').parentElement.submit();
    }
    document.getElementById('sluo').parentElement.children[1].subm
</script>