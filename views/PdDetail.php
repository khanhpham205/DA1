<style>
    /*______________________________ san pham chi tiet ______________________________*/
    main{
        #imglist::-webkit-scrollbar {
            display: none;
        }
        #imglist {
            width: 100%;
            overflow-y: auto;
            img {
                user-select: none;
                width: 100%;
                padding: 0;
                margin: 0;
                aspect-ratio: 1/1;
            }
            img.active {
                border-bottom: 2px solid black;
            }
        }

        #product_img {
            grid-column: span 6;
            aspect-ratio: 1/1;
            img {
                width: 100%;
                aspect-ratio: 1/1;
            }
        }

        .info6col {
            grid-column: span 6/13;
            width: 100%;
            aspect-ratio: 1/1;

            hr {
                background-color: black;
            }
        }

        .info6col1 {
            display: flex;
            grid-column: span 6;
            width: 100%;
            aspect-ratio: 1/1;
            align-items: center;
            justify-content: center;

            hr {
                background-color: black;
            }

        }

        .see {
            h1 {
                text-align: center;
                color: #00ff4c;
            }

            h2,
            h3,
            h4 {
                text-align: center;
            }
        }

        .info {
            grid-column: span 5;
            h1,h2,h3,h4,h5,h6 {
                margin: 0;
                padding: 0;
            }
            .sl {
                display: flex;
                margin: 2% 0;
                width: 100px;
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
                }
                input {
                    border: none;
                    text-align: center;
                    width: 40px;
                }
                input::-webkit-outer-spin-button,
                input::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
            }
            button {
                width: 100%;
                cursor: pointer;
                color: white;
                font-size: larger;
                background-color: #FF794C;
                border: 3px solid #FF794C;
                border-radius: 200px;
                padding: 10px;
            }
            button:hover {
                background: none;
                color: #FF794C;
            }
            form{
                input[type="radio"]{
                    -webkit-appearance: none;
                    border: 2px solid grey;
                    background-size: 100%; 
                    aspect-ratio: 1/1;
                    width: 80px;
                    border-radius: 10px;
                }
                input[type="radio"]:checked {
                    border: 2px solid #FF794C;

                    /* background: url(images/radio_checked.png) left center no-repeat; */
                }
            }
        }

        .info_detail {
            height: 400px;
            background-color: #272727;
        }
    }

    .product-info {
        display: block;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;

        div {
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        h3 {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
    }
    /*_______________________________________________________________________________*/
</style>
<main class="col12">
    <div id="imglist">
        <?php
        foreach ($sp['imgs'] as $img) {
            echo "
            <img class='' aria-valuetext='{$img['id_optioncontents']}' src='contents/imgs/products/{$img['id_img']}'>
            ";
        }
        ?>
    </div>
    <div id="product_img">
        <img src="">
    </div>
    <div class="info">
        <h1>
            <?php
                echo $sp['ten_sanpham'];
            ?>
        </h1>
        <p class="pricetag">
            <?php
                $gia='';
                $giasp = number_format($sp['gia_sanpham']);
                if($sp['giamgia']){
                    $giaspgiam = number_format($sp['gia_sanpham']*(1-($sp['giamgia'])/100));
                    $giasp = $giaspgiam.' đ <del>'.$giasp.' đ</del>';
                }

                echo $giasp;
            ?>
        </p>
        <hr>
        <div class="order_zone">
            <h2>Chi tiết sản phẩm</h2>
            <?php
                //_____________ chi tiet san pham _____________ 
                foreach(explode("|",$sp['mota_sanpham']) as $mt ){
                    echo "<h4> &#8226; {$mt}</h4>";
                }
            ?>
          
            <form action="POST">
                <?php
                    // ___________________________ options ___________________________  
                    foreach($option as $op){
                        echo "<h3>{$op['tieude_option']}:</h3>";
                        foreach($op['ops'] as $opitems){
                            echo"<input type='radio' name='option' onclick='chooseOption(this)' aria-valuetext='{$opitems['id_optioncontents']}'
                                    style='background-image: url(". '"' ."contents/imgs/products/{$opitems['img']['id_img']}".'"'.")'
                                    value='{$opitems['id_optioncontents']}' checked></input>";
                        }
                    }
                ?>
                <h3>Số lượng: </h3>
                <div class="sl">
                    <div onclick="this.parentElement.children[1].stepUp(-1)">-</div>
                    <input type="number" min="1" id="sluo" oninput="validity.valid||(value=1);" value="1">
                    <div onclick="this.parentElement.children[1].stepUp(1)">+</div>
                </div>
                <button id="addbt" value=" <?php echo $sp['id_sanpham']?> ">Add to cart</button>
            </form>

        </div>
    </div>
    <hr class="full12col">
    <div class="info6col1">
        <div class="see">
            <h3><strong>Chuột không dây siêu nhẹ Pulsar Xlite V3 (Hỗ trợ 4K Polling Rate)</strong></h3><br>
            <h1>Ultralight - Cảm biến 26K - Lag-free 2.4GHz</h1><br>
            <h4>Trọng lượng siêu nhẹ dưới 60gram mà không đục lỗ. Trang bị cảm biến mới nhất 26K. Kết nối không dây lag-free 2.4GHz. Dáng chuột hoàn toàn hướng đến sự thoải mái.</h4><br>
            <h4>Đây là Pulsar Xlite V3, thế hệ tiếp theo tiếp nối sự thành công của phiên bản Xlite V3 đầu tiên với hàng loạt cải tiến về công nghệ, chất lượng và thiết kế sản phẩm. Kết hợp dáng chuột công thái học.</h4>
        </div>
    </div>
    <div class="info6col">
        <div class="product-info">
            <div>
                <h3>Kích Thước</h3>
                <p><strong>Large (Size 3):</strong> 126.6mm x 69.5mm x 44.5mm</p>
                <p><strong>Medium (Size 2):</strong> 122mm x 66mm x 43mm</p>
                <p><strong>Mini (Size 1):</strong> 115.6mm x 63.4mm x 40.7mm</p>
            </div>

            <div>
                <h3>Trọng Lượng</h3>
                <p><strong>Large (Size 3):</strong> 58g (+- 1g)</p>
                <p><strong>Medium (Size 2):</strong> 55g (+- 1g)</p>
                <p><strong>Mini (Size 1):</strong> 52g (+- 1g)</p>
            </div>

            <div>
                <h3>Thông Tin Khác</h3>
                <p><strong>Dáng chuột:</strong> Công thái học</p>
                <p><strong>Switch:</strong> Optical Switch</p>
                <p><strong>Con lăn:</strong> Pulsar Blue chống bụi</p>
                <p><strong>Pin:</strong> Lên đến 100 giờ (±10%) tại 1000Hz polling rate</p>
                <p><strong>Thời lượng pin:</strong> Có thể thay đổi tùy vào môi trường sử dụng</p>
            </div>
        </div>
        <!-- san pham cung danh muc -->
    </div>


</main>
<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
    const img_list = [...document.getElementById('imglist').children];
    const mainimg = document.getElementById('product_img').children[0];
    img_list[0].parentElement.style.height = mainimg.offsetHeight;

    function resetimgs(){
        img_list.forEach(element=>{
            element.classList.remove('active');
        })
    }

    img_list.forEach((el)=>{
        el.addEventListener('click',(event)=>{
            mainimg.src = el.src;
            resetimgs()
            el.classList.add('active');
            img_list[0].parentElement.scroll(0, el.offsetHeight *  (img_list.indexOf(el)-2) );
        })
    })
    img_list[0].click();

    function chooseOption(x){
        for(const e of img_list){
            if(e.getAttribute('aria-valuetext')==x.getAttribute('aria-valuetext')){
                e.click();
                break;
            }
        }
    }

</script>