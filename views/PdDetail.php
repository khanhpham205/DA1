<style>
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
                margin:2px 0;
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
    }
</style>
<title><?php
                echo $sp['ten_sanpham'];
            ?></title>

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
                    echo "<h5> &#8226; {$mt}</h5>";
                }
            ?>
          
            <form method="POST">
                <?php
                    // ___________________________ options ___________________________  
                    foreach($option as $op){
                        echo "<h3>{$op['tieude_option']}:</h3>";
                        foreach($op['ops'] as $opitems){
                            echo"<input type='radio' name='option' onclick='chooseOption(this)' class='check1' style='margin:0 3px;background-image: url(". '"' ."contents/imgs/products/{$opitems['img']['id_img']}".'"'.")'
                                    value='{$opitems['id_optioncontents']}' checked></input>";
                        }
                    }
                ?>
                <h3>Số lượng: </h3>
                <div class="sl">
                    <div onclick="this.parentElement.children[1].stepUp(-1)">-</div>
                    <input type="number" min="1" id="sluo" name="soluong" oninput="validity.valid||(value=1);" value="1">
                    <div onclick="this.parentElement.children[1].stepUp(1)">+</div>
                </div>
                <button id="addbt" name="addtocart" value=" <?php echo $sp['id_sanpham']?> ">Add to cart</button>
            </form>

        </div>
    </div>
    <hr class="full12col">

    <div class="box_sp col12 full12col">
        <h2 class="full12col">Sản Phẩm Liên Quan</h2>
        <?php
            foreach($likelyPd as $sp){
                $tensp = $sp['ten_sanpham'];
                $giasp = number_format($sp['gia_sanpham']);
                $img = $sp[0]['id_img'];
                if($sp['giamgia']){
                    $giaspgiam = number_format($sp['gia_sanpham']*(1-($sp['giamgia'])/100));
                    $giasp = $giaspgiam.'đ <del>'.$giasp.'đ</del>';
                }
                echo("<a href='?page=product&id={$sp['id_sanpham']}' class='sp'>
                        <img src='contents/imgs/products/{$img}'>
                        <h3 title='{$tensp}'> {$tensp} </h3>
                        <p>{$giasp}</p>
                    </a>");
          }
        ?>
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
            if(e.getAttribute('aria-valuetext')==x.value){
                e.click();
                break;
            }
        }
    }
    document.querySelector('.check1').click()
</script>