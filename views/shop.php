<style>
    .price_box{
        user-select: none;
        align-items: center ;
        padding: 10px 0;
        .value-box {
            padding: 4px 0;
            width: 100%;
            text-align: center;
            font-weight: bold;
            color: #FF794C;
            border: 2px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .slider-container {
            grid-column: 5/9;
            position: relative;
            width: 100%;
        }
        .range-slider {
            position: relative;
            height: 5px;
            background: #ddd;
            border-radius: 5px;
            .range {
                position: absolute;
                height: 5px;
                background: #FF794C;
                border-radius: 5px;
            }
            input[type="range"] {
                position: absolute;
                width: 100%;
                -webkit-appearance: none;
                appearance: none;
                background: transparent;
                pointer-events: none;
                margin: 0;
            }
            input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 20px;
                height: 20px;
                background: #FF794C;
                border: 2px solid #fff;
                border-radius: 50%;
                cursor: pointer;
                pointer-events: all;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                position: relative;
                top: -8px; 
            }
            input[type="range"]::-moz-range-thumb {
                width: 20px;
                height: 20px;
                background: #FF794C;
                border: 2px solid #fff;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                position: relative;
                top: -8px;     
            }
        }
    }
            .banner_danhmuc{
                width: 100%;
                color: white; 
                align-items: center;
                background: url('contents/imgs/banner/<?=$tag['img']?>');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                overflow: hidden;
                height:600px;            
                margin: 0;
                .content{
                    height: fit-content;
                    grid-column: 2/6;
                    background-color: #272727;
                    padding: 10px;
                    border-radius: 10px;
                    h1{
                        padding: 0 10px;
                    }
                    p{
                        padding: 0 10px;
                    }
                }
            }
</style>

<main class="banner_danhmuc banner col12">
    <div class="content">
        <?php
        if($tag){
            echo "<h1>{$tag['name']}</h1>";
            foreach(explode('|',$tag['content']) as $cont){
                echo "<p>{$cont}</p>";
            }
        }
        ?>
    </div>
</main>

<div class="price_box col12">
    <div class="value-box" style="grid-column: 4/5;" id="minValue">0 đ </div>

    <div class="slider-container">
        <div class="range-slider">
            <div class="range" id="range"></div>
            <input type="range"  id="minSlider" min="0" max="4620000" step="1000" value="0">
            <input type="range" id="maxSlider" min="0" max="4620000" step="1000" value="4620000">
        </div>
    </div>

    <div class="value-box" id="maxValue">4,620,000 đ </div>
</div>

<div class="box_sp col12">
    <?php
        if(!$tag){
            echo "<h2 class='full12col'>Sản Phẩm Liên Quan</h2>";
            echo "<script>document.querySelector('main').style.height=0;document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;</script>";
        }
        foreach($listSp as $sp){
            $tensp = $sp['ten_sanpham'];
            $giasp = number_format($sp['gia_sanpham']);
            $img = $sp[0]['id_img'];
            if($sp['giamgia']){
                $giaspgiam = number_format($sp['gia_sanpham']*(1-($sp['giamgia'])/100));
                $giasp = $giaspgiam.'đ <del>'.$giasp.'đ</del>';
            }
            echo("
            <a href='?page=product&id={$sp['id_sanpham']}' class='sp'>
                <img src='contents/imgs/products/{$img}'>
                <h3 title='{$tensp}'> {$tensp} </h3>
                <p>{$giasp}</p>
            </a>  
            ");

        }
    ?>
</div>

<script>
    const minSlider = document.getElementById('minSlider');
    const maxSlider = document.getElementById('maxSlider');
    const range = document.getElementById('range');
    const minValue = document.getElementById('minValue');
    const maxValue = document.getElementById('maxValue');

    const updateRange = () => {
        const min = parseInt(minSlider.value);
        const max = parseInt(maxSlider.value);

        const rangeMin = (min / maxSlider.max) * 100;
        const rangeMax = (max / maxSlider.max) * 100;
        range.style.left = `${rangeMin}%`;
        range.style.right = `${100 - rangeMax}%`;

        minValue.textContent = `${min.toLocaleString()} đ`;
        maxValue.textContent = `${max.toLocaleString()} đ`;
    };

    minSlider.addEventListener('input', () => {
        if (parseInt(minSlider.value) >= parseInt(maxSlider.value)) {
            minSlider.value = maxSlider.value - 1000; 
        }
        updateRange();
    });

    maxSlider.addEventListener('input', () => {
        if (parseInt(maxSlider.value) <= parseInt(minSlider.value)) {
            maxSlider.value = parseInt(minSlider.value) + 1000; 
        }
        updateRange();
    });

    updateRange(); 
</script>
         
