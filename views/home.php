<style>
    .danhmuc{
      margin: 30px 0;
      a{
          grid-column: span 2;
          width: 100%;
          font-weight: bold;
          text-align: center;
          text-decoration: none;
          color: black;
          svg{
              height: 100%;
              width: 100%;
          }
      }
    }
    .box_sp{
        margin-bottom: 50px;
        h1,h2,h3,h4,h5,h6{
            font-weight: bold;
        }
    }
    .sp{
        text-decoration: none;
        color: black;
        cursor: pointer;
        grid-column: span 3;
        display: flex;
        justify-content: space-between;
        height: 100%;
        flex-direction: column;
        user-select:text;
        img{
            user-select: none;
            width: 100%;
            aspect-ratio: 1/1;
        }
        h3{

            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            padding-top: 5px ;
        }
        p{
            margin: 0;
            padding-top: 5px;
            color:red;
            font-size: 17px;
            font-weight: bold;
            del{
                font-size: 10px;
                font-weight: normal;
                color: grey;
            }   
        }
    }
</style>
<body>
    <?php include_once('componant_banner.php');?>
    <div class="danhmuc col12">
    <div style="grid-column: span 2;"></div>
    <a href="">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 3V9M12 3C15.3137 3 18 5.68629 18 9M12 3C8.68629 3 6 5.68629 6 9M6 9H18M6 9V15C6 18.3137 8.68629 21 12 21C15.3137 21 18 18.3137 18 15V9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p>Mouse</p>
    </a>
    <a href="">
        <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 13H6.01M6 17H6.01M10 13H10.01M14 13H14.01M18 17H18.01M18 13H18.01M16 3V5H8V9M10 17H14M5.2 21H18.8C19.9201 21 20.4802 21 20.908 20.782C21.2843 20.5903 21.5903 20.2843 21.782 19.908C22 19.4802 22 18.9201 22 17.8V12.2C22 11.0799 22 10.5198 21.782 10.092C21.5903 9.71569 21.2843 9.40973 20.908 9.21799C20.4802 9 19.9201 9 18.8 9H5.2C4.07989 9 3.51984 9 3.09202 9.21799C2.71569 9.40973 2.40973 9.71569 2.21799 10.092C2 10.5198 2 11.0799 2 12.2V17.8C2 18.9201 2 19.4802 2.21799 19.908C2.40973 20.2843 2.71569 20.5903 3.09202 20.782C3.51984 21 4.0799 21 5.2 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p>Keyboard</p>
    </a>
    <a href="">
        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"   >
            <g>
                <path class="st0" d="M182.248,341.784c-3.692-24.802-26.77-41.91-51.562-38.228c-24.793,3.652-41.93,26.75-38.25,51.553
                    l2.533,17.066c-9.875,2.3-16.532,11.751-15.019,21.959l7.594,51.229c1.513,10.198,10.621,17.309,20.738,16.653l1.674,11.247
                    c3.672,24.803,26.74,41.92,51.552,38.239c24.793-3.672,41.911-26.74,38.249-51.552L182.248,341.784z"/>
                <path class="st0" d="M417.033,372.175l2.532-17.066c3.682-24.803-13.455-47.901-38.248-51.553
                    c-24.793-3.681-47.872,13.426-51.563,38.228l-17.51,118.165c-3.662,24.812,13.455,47.88,38.248,51.552
                    c24.814,3.681,47.882-13.436,51.552-38.239l1.674-11.247c10.117,0.656,19.226-6.456,20.739-16.653l7.594-51.229
                    C433.565,383.926,426.908,374.475,417.033,372.175z"/>
                <path class="st0" d="M436.702,75.529C391.927,27.769,328.281-0.091,256,0C183.72-0.091,120.073,27.769,75.3,75.529
                    c-44.856,47.7-70.728,114.735-70.688,191.595c0,8.604,0.323,17.339,0.978,26.185c5.246,71.302,17.914,127.968,23.239,151.874
                    l40.326-8.978c-5.245-23.542-17.328-77.747-22.372-145.943c-0.574-7.846-0.857-15.563-0.857-23.138
                    c0.04-67.721,22.493-123.914,59.481-163.302C142.485,64.484,194.19,41.406,256,41.315c61.801,0.091,113.514,23.17,150.593,62.507
                    c36.987,39.387,59.44,95.58,59.48,163.302c0,7.575-0.282,15.292-0.857,23.148c-5.042,68.186-17.127,122.391-22.372,145.933
                    l40.326,8.978c5.326-23.906,17.995-80.572,23.24-151.874c0.656-8.857,0.978-17.582,0.978-26.185
                    C507.429,190.263,481.557,123.228,436.702,75.529z"/>
            </g>
        </svg>
        <p>Headset</p>
    </a>

    <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.792 474.792">
            <g>
                <path d="M407.776,0H67.016C30.063,0,0,30.063,0,67.016v340.759c0,36.953,30.063,67.016,67.016,67.016h340.759c36.953,0,67.016-30.063,67.016-67.016V67.016C474.792,30.063,444.728,0,407.776,0z M442.94,407.776c0,19.395-15.778,35.164-35.164,35.164H67.016c-19.387,0-35.165-15.77-35.165-35.164V67.016c0-19.395,15.778-35.164,35.165-35.164h44.722c4.55,50.157,46.782,89.583,98.091,89.583h42.202c33.042,0,59.924,26.875,59.924,59.924v4.65c3.919-0.513,7.885-0.871,11.944-0.871c4.06,0,8.025,0.358,11.945,0.871v-4.65c0-46.207-37.598-83.813-83.813-83.813h-42.202c-38.096,0-69.263-28.788-73.743-65.694h271.69c19.387,0,35.164,15.77,35.164,35.164V407.776z"/>
                <path d="M323.9,201.065c-41.347,0-74.863,33.516-74.863,74.871v54.309c0,41.355,33.516,74.871,74.863,74.871s74.863-33.516,74.863-74.871v-54.309C398.763,234.581,365.247,201.065,323.9,201.065z M339.826,278.704c0,8.802-7.132,15.926-15.926,15.926c-8.796,0-15.926-7.124-15.926-15.926v-38.819c0-8.802,7.13-15.926,15.926-15.926c8.794,0,15.926,7.124,15.926,15.926V278.704z"/>
            </g>
        </svg>
        <p>Mouse Pad</p>
    </a>
    </div>
    <div class=" box_sp sale col12">
        <h2 class="full12col">Khuyến Mãi Hời</h2>
        <hr>
        <?php
            foreach($discountSp as $sp){
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
    <div class=" box_sp new col12">
        <h2 class="full12col">Sản Phẩm Mới</h2>
        <hr>
        <?php
            foreach($newSp as $sp){
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
</body>