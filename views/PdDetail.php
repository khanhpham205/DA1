<style>
    .col12 {
        display: grid;
        grid-template-columns: repeat(12, 80px);
        justify-content: center;
        gap: 20px;
    }

    .full12col {
        grid-column: 1/13;
    }

    .pricetag {
        color: red;
        font-weight: bold;
        del{
            color: grey;
            font-size: 10px;
        }
    }
    hr{
        width: 100%;
    }

    /*______________________________ san pham chi tiet ______________________________*/
    main {
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

        .col3 {
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            grid-column: span 3;

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
                margin: 2%;
                width: 20%;
                /* overflow: hidden; */
                border-radius: 100vh;
                justify-content: space-between;
                box-shadow: 0 0 5px black;

                div {
                    background-color: white;
                    height: 3vh;
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

            .deg{
                width:100%;

            }
        }

        .info_detail {
            height: 400px;
            background-color: #272727;
        }
    }

    .color-picker {
        margin-top: 20px;
    }

    .color-option {
        display: inline-block;
        width: 100px;
        height: 100px;
        margin: 10px;
        border: 2px solid #ccc;
        cursor: pointer;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .color-option:hover {
        transform: scale(1.1);
    }

    .selected-image {
        margin-top: 20px;
        border: 2px solid #ccc;
        display: inline-block;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        width: 100%;
        aspect-ratio: 1/1;
        position: relative;
        grid-column: span 6;

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .card-container {

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }

    .card {
        width: 70px;
        height: 70px;
        border: 2px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
            <img class=''  src='contents/imgs/products/{$img['id_img']}'>
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
            <div>
                <div class="deg">
                    <h2>Chi tiết sản phẩm</h2>
                    <?php
                        //___________________________ chi tiet san pham ___________________________ 
                        $mota = explode("|",$sp['mota_sanpham']);
                        foreach($mota as $mt ){
                            echo "<h4> &#8226; {$mt}</h4>";
                        }
                    ?>
                    
                    <?php
                        // ___________________________ options ___________________________  
                        // var_dump($option);
                        foreach($option as $op){
                            echo "<h3>{$op['tieude_option']}:</h3>";
                            foreach($op['ops'] as $opitems){
                                echo"{$opitems['noidung']}";






                            }
                        }
                        
                        
                        
                        
                        
                    ?>
                    <!-- <h3>Chọn màu sắc cho sản phẩm</h3> -->

                    <div class="color-picker">
                        <div class="color-option"
                            style="background-image: url('../contents/imgs/cc/1.png');"
                            onclick="selectColor('../contents/imgs/cc/1.png')">
                        </div>

                        <div class="color-option"
                            style="background-image: url('../contents/imgs/cc/2.png');"
                            onclick="selectColor('../contents/imgs/cc/2.png')">
                        </div>
                    </div>

                </div>
                <label>Số lượng</label>
                <div class="sl">
                    <div onclick="this.parentElement.children[1].stepUp(-1)">-</div>
                    <input type="number" min="1" id="sluo" oninput="validity.valid||(value=1);" value="1">
                    <div onclick="this.parentElement.children[1].stepUp(1)">+</div>
                </div>
            </div>
            <button id="addbt" type="1">Add to cart</button>
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

    console.log(img_list);
    img_list.forEach((el)=>{
        el.addEventListener('click',(event)=>{
            mainimg.src = el.src;
            resetimgs()
            el.classList.add('active');
            img_list[0].parentElement.scroll(0, el.offsetHeight *  (img_list.indexOf(el)-2) );
        })
    })
    img_list[0].click();

</script>