<style>
    main{
        input,select{
            background-color: #eee;
            border: none;
            /* margin: 8px auto; */
            margin: 8px auto;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 95%;
            outline: none;
        }
        .admin_tag{
            grid-column:1/3 ;
            display: flex;
            flex-direction: column;
            hr{
                width: 100%;
            }
            button{
                border: 2px solid rgba(0, 0, 0, 0);
                height: 40px;
                background: none;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                border-radius: 2px;
                transition: 0.3s;
                text-align: start;
            }
            button.active{
                background-color: grey;
                color:white;
            }
        }
        .admin_contents{
            min-height: 80vh;
            border-radius: 10px;
            grid-column:3/13 ;
            box-shadow: 0 0 5px black;
            >div{
                display:none;
                h1{
                    margin-top:10px ;
                    text-align: center;
                }
                >a{
                    color: black;
                }
            }
            >div.active{
                display: block;
            }
        }
        .addbutn{
            display: flex;
            align-items: center ;
            text-decoration: none;
            width: fit-content;
            padding:0 15px;
            border-radius: 15px;
            margin-left: 22px ;
        }
        .addbutn:hover{
            box-shadow: 0 0 5px grey;
        }
        .delete{
            border: 2px solid red ;
            color :red;
        }
        .edit{
            color :blue;
            border: 2px solid blue ;
        }
        .edit:hover{
            background: blue !important;
            color:white;
        }
        .delete:hover{
            color:white;
            background: red !important;
        }
        
    }
    
    
    #thongke{

    }
    
    /* _______________________________SAN PHAM_______________________________ */
    .admin_sanpham{
        display: grid;
        grid-template-columns: 150px 552px 88px 88px;
        gap: 20px;
        justify-content: center ;
        height: 150px;
        margin: 15px auto;
        img{
            grid-row: 1/3;
            grid-column: 1/2;
            aspect-ratio: 1/1;
            width: 100%;
        }
        h1,h2,h3,h4,h5,h6{
            grid-column: 2/5;
            margin: 0;
            padding: 0;
            height: fit-content;
        }
        p{
            margin: 0;
        }
        a,button{
            text-decoration: none;
            cursor: pointer;
            align-self: end;
            justify-self: end;
            width: 100%;
            height: fit-content;
            background: none;
            border-radius: 20px;
            font-size: 15px;
            text-align: center;
        }
        .delete{
            grid-column: 4/5;
        }
        .edit{
            grid-column: 3/4;
        }
    }
    /* _______________________________DANH MUC_______________________________ */
    .admin_danhmuc{
        justify-self: center;
        display: grid;
        grid-template-columns: 744px 88px 88px;
        padding: 10px 0;
        width: fit-content;
        border-bottom: 1px solid grey;
        gap:20px;
        h1,h2,h3,h4,h5,h6,p{
            padding: 0 15px;
            margin: 0;
        }
        >a,button{
            text-decoration: none;
            cursor: pointer;
            align-self: end;
            justify-self: end;
            width: 100%;
            background: none;
            border-radius: 20px;
            font-size: 15px;
            text-align: center;
        }
    }
    /* _______________________________  HANG  _______________________________ */
    .admin_hang{
        justify-self: center;
        display: grid;
        grid-template-columns: 744px 88px 88px;
        padding: 10px 0;
        /* margin: auto 10px; */
        width: fit-content;
        border-bottom: 1px solid grey;
        gap:20px;
        /* box-shadow: 0 0 1px grey; */
        h1,h2,h3,h4,h5,h6,p{
            padding: 0 15px;
            margin: 0;
        }
        >a,button{
            text-decoration: none;
            cursor: pointer;
            align-self: end;
            justify-self: end;
            width: 100%;
            background: none;
            border-radius: 20px;
            font-size: 15px;
            text-align: center;
        }
    }
    /* _______________________________DON HANG_______________________________ */
    #donhang{
        .donhangAdmin_item{
            margin: 10px auto ;
            justify-self: center;
            width: 95%;
            padding: 10px ;
            padding: auto 10px !important;
            border-radius: 10px ;
            background-color: #f3f4f6;

            display: grid;
            grid-template-columns: 70% 30%;
            gap: 5px;
            justify-content: center;

            .donhangAdmin_items{
                .donhang_items{
                    /* width: 100%; */
                    display: grid;
                    padding:10px ;
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
                .donhang_items:not(:last-child):after{
                    content:"";
                    grid-column: 1/3 ;
                    justify-content: center ;
                    display: block;
                    border-bottom: 1px solid grey;
                }
            }
            .info{
                display: grid;
                grid-template-columns: 50% 50%;
                border-left: 1px grey solid;
                padding-left: 10px;
            }
        }
    }
    option:disabled{
        opacity: 0.6;
        background-color: #ff888f;
    }
    /* ______________________________________________________________________ */
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
</style>
<title>POLY Computer ADMIN</title>
<main class="col12">
    <div class="admin_tag">
        <button aria-valuetext="thongke" class="active" >Thống Kê</button>
        <hr>
        <button aria-valuetext="sanpham">Sản Phẩm</button>
        <button aria-valuetext="danhmuc">Danh Mục</button>
        <button aria-valuetext="hang">Hãng</button>
        <button aria-valuetext="donhang">Đơn Hàng</button>
    </div>
    <div class="admin_contents">

        <div class="active" id="thongke">
            <h1>Thống kê</h1>
            <!-- <form action="">
            </form> -->
        </div>


        <div id="sanpham">
            <h1>Sản Phẩm</h1>
            <a href="?page=admin_edit&type=sanpham" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <?php
                foreach($allPd as $sp){
                    $giasp = number_format($sp['gia_sanpham']);
                    if($sp['giamgia']){
                        $giaspgiam = number_format($sp['gia_sanpham']*(1-($sp['giamgia'])/100));
                        $giasp = $giaspgiam.' đ <del>'.$giasp.' đ</del>';
                    }
                    echo "
                    <div class='admin_sanpham'>
                        <img src='contents/imgs/products/{$sp[0]['id_img']}'>
                        <h3>{$sp['ten_sanpham']}<br><p class='pricetag'>{$giasp}</p></h3>
                        <a href='?page=admin_edit&type=sanpham&id={$sp[0]['id_sanpham']}' class='edit'>edit</a>
                        <button class='delete' value>delete</button>
                    </div>";
                }
            ?>
        </div>


        <div id="danhmuc">
            <h1>Danh Mục</h1>
            <a href="?page=admin_edit&type=danhmuc" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <?php
              foreach($allDm as $Dm){
                echo "
                <div class='admin_danhmuc'>
                    <h3>{$Dm['ten_danhmuc']}</h3>
                    <a href='?page=admin_edit&type=danhmuc&id={$Dm['id_danhmuc']}' class='edit'>edit</a>
                    <button class='delete'>delete</button>
                </div>";
              }
            ?>
        </div>


        <div id="hang">
            <h1>Hãng</h1>
            <a href="?page=admin_edit&type=hang" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <?php
              foreach($allHang as $ha){
                echo "
                <div class='admin_hang'>
                    <h3>{$ha['ten_hang']}</h3>
                    <a href='?page=admin_edit&type=hang&id={$ha['id_hang']}' class='edit'>edit</a>
                    <button class='delete'>delete</button>
                </div>";
              }
            ?>
            <!-- <div class="admin_hang">
                <h3>ten hang</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div> -->
        </div>


        <div id="donhang">
            <h1>Đơn Hàng</h1>
            <div class="tags">
                <li class="active" data-tag="all" >Tất cả đơn hàng</li>
                <li data-tag="verifying"  >Chờ xác nhận</li>
                <li data-tag="delivering" >Chờ giao hàng</li>
                <li data-tag="success"    >Giao hàng thành công</li>
                <li data-tag="canceled"   >Đã Hủy</li>
            </div>
            <hr>
            <div class="content_tags active" id="all">  
                <?php
                    // echo json_encode($allDonHang,JSON_FORCE_OBJECT);
                    function verifying($e){return $e['status'] == 'choxacnhan';}
                    function delivering($e){return $e['status'] == 'chogiaohang';}
                    function success($e){return $e['status'] == 'giaohangthanhcong';}
                    function canceled($e){return $e['status'] == 'huydonhang';}


                    function loaddonhangAdmin($data){
                        foreach($data as $donhang){
                            $tonggia=0;
                            $div='';
                            foreach($donhang['donhangItemsList'] as $i){
                                $giasp = number_format($i['gia_sanpham']).'đ';  
                                if($i['giamgia']!=0){
                                    $giaspgiam = number_format($i['gia_sanpham']*(1-($i['giamgia'])/100));
                                    $giasp = $giaspgiam.'đ <del>'.$giasp.'</del>';
                                    $tonggia += $i['gia_sanpham']*(1-($i['giamgia'])/100);
                                }else{
                                    $tonggia +=  + $i['gia_sanpham'];
                                }
                                $div.="
                                    <div class='donhang_items'>
                                        <h4>{$i['ten_sanpham']}</h4>
                                        <p class='op'>{$i['tieude_option']} : {$i['noidung']}</p>
                                        <p class='pricetag'>{$giasp}</p>
                                    </div>
                                ";
                            }
                          
                            switch ($donhang['status']){
                                case 'choxacnhan':
                                    $optionstatus="
                                        <select class='updatattdh' name='updatadonhangstatus' onchange='this.parentElement.submit()'>
                                            <option value='choxacnhan'        > Chờ Xác Nhận</option>
                                            <option value='chogiaohang'       > Chờ Giao Hàng</option>
                                            <option value='giaohangthanhcong' > Giao Hàng Thành Công</option>
                                            <option value='huydonhang'        > Hủy Đơn Hàng</option>
                                        </select>
                                    ";
                                    break;
                                case 'chogiaohang':
                                    $optionstatus="
                                        <select class='updatattdh' name='updatadonhangstatus' onchange='this.parentElement.submit()'>
                                            <option value='choxacnhan'     disabled    > Chờ Xác Nhận</option>
                                            <option value='chogiaohang'  selected > Chờ Giao Hàng</option>
                                            <option value='giaohangthanhcong'     > Giao Hàng Thành Công</option>
                                            <option value='huydonhang'            > Hủy Đơn Hàng</option>
                                        </select>
                                    ";
                                    break;
                                case 'giaohangthanhcong':
                                    $optionstatus = "<h4 style='color:green; '>Giao Hàng Thành Công</h4>";
                                    break;
                                case 'huydonhang':
                                    $optionstatus = "<h4 style='color:red;'>Hủy Đơn Hàng</h4>";
                                    break;
                            }

                            $tonggia = number_format($tonggia);
                            echo"
                                <div class='donhangAdmin_item'>
                                        <div class='donhangAdmin_items'>
                                            {$div}
                                        </div>
                                        <div class='info'>
                                            <h4 style='grid-column:1/3; text-align:center; color:#FF794C;'></h4>
                                            <form method='POST' style='grid-column:1/3; margin:0;'>
                                                <input type='number' name='iddonhang' value='{$donhang['id_donhang']}' hidden>
                                                $optionstatus
                                            </form>
                                            <h5 class='titletag'>Tên người nhận:</h5>
                                            <h6 class='contenttag'>{$donhang['user']['ten_user']}</h6>

                                            <h5 class='titletag'>Số điện thoại:</h5>
                                            <h6 class='contenttag'>{$donhang['user']['phonenumber']}</h6>

                                            <h5 class='titletag'>Địa chỉ nhận hàng:</h5>
                                            <h6 class='contenttag'>{$donhang['user']['address']}</h6>  
                                            
                                            <h5 class='titletag'>Tổng thành tiền:</h5>
                                            <h6 class='contenttag' id='giacuoicung' style='color:red;'>{$tonggia}đ</h6>
                                        </div>
                                    </div>
                            ";
                        }
                    }


                    $verifying = array_filter($allDonHang,'verifying');
                    $delivering = array_filter($allDonHang,'delivering');
                    $success = array_filter($allDonHang,'success');
                    $canceled = array_filter($allDonHang,'canceled'); 

                    loaddonhangAdmin($allDonHang);
                ?>
            </div>
            <div class="content_tags" id="verifying" > <?php loaddonhangAdmin($verifying);  ?>    </div>
            <div class="content_tags" id="delivering"> <?php loaddonhangAdmin($delivering); ?>    </div>
            <div class="content_tags" id="success"   > <?php loaddonhangAdmin($success);    ?>    </div>
            <div class="content_tags" id="canceled"  > <?php loaddonhangAdmin($canceled);   ?>    </div>
        </div>

    </div>
</main>

<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
    
    const butts = [...document.querySelectorAll('button')];
    const contents = [...document.querySelector('.admin_contents').children];
    butts.forEach((element)=>{element.addEventListener('click',(e)=>{

            butts.forEach((but)=>{
                but.classList.remove('active');
            })
            element.classList.add('active');
            contents.forEach((el)=>{
                el.classList.remove('active');
            })
            document.getElementById(element.getAttribute('aria-valuetext')).classList.add('active')
        })
    });

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
