<style>
    
    .avatar {
        width: 128px;
        height: 128px;
        border-radius: 50%;
        object-fit: cover;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .card {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .card h2 {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-top: 20px;
    }

    .card .user-info {
        margin-top: 30px;
    }

    .card .user-info div {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .card .user-info span {
        color: #555;
    }

    .card .user-info .value {
        font-weight: bold;
        color: #333;
    }

    .col12{
        display: grid;
        grid-template-columns: repeat(12,80px);
        justify-content: center;
        align-items: start;
        gap: 20px;
        hr{
            width: 100%;
        }
    }
    .full12col{
        grid-column:1/13;
    }
    .pricetag{
        color: red;
        font-weight: bold;
        del{
            font-size: 10px;
            color: grey;
        }
    }
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
        .user_tag{
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
        .user_contenrs{
            min-height: 80vh;
            border-radius: 10px;
            grid-column:3/13 ;
            box-shadow: 0 0 5px black;
            >div{
                display:none;
                h1{
                    text-align: center;
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

        #thongtin{

        }
        #donhang{
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
        }
        #giohang{
            button{
                align-self: end;
                justify-self: end;
                width: 100%;
                height: fit-content;
                background: none;
                border-radius: 20px;
                font-size: 15px;
            }
            .admin_danhmuc{
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
            }
        }
        #logout{
            width: 100%;
            >button:hover{
                width: 100%;
                color:#fff;
                background-color: #c53030;
            }
            
        }
        #dangxuat{
            
            button{
                align-self: end;
                justify-self: end;
                width: 100%;
                height: fit-content;
                background: none;
                border-radius: 20px;
                font-size: 15px;
            }
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
            }
        }
        
    }
        .giohang {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .cart-total {
            text-align: right;
            margin-top: 10px;
        }

        .checkout-btn {
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout-btn:hover {
            background-color: #ff4c4c;
        }

</style>
<?php
// var_dump($user);



?>
<main class="col12">
    <div class="user_tag">
        <button aria-valuetext="thongtin" class="active" >Thông Tin Người Dùng</button>
        <hr>
        <button aria-valuetext="donhang">Đơn Hàng Của Bạn</button>
        <button aria-valuetext="giohang">Giỏ Hàng</button>
        <form id="logout" method="POST">
            <button name="logout">Đăng Xuất</button>
        </form>
    </div>
    <div class="user_contenrs">
        <div class="active" id="thongtin">
            <h1>Thong ke</h1>
            <div class="card">
                <div class="avatar-container">
                    <img src="<?= $user ? $user['avatar_url'] : 'https://via.placeholder.com/150' ?>" alt="Ảnh đại diện" class="avatar">
                </div>
                <h2>Thông Tin Tài Khoản</h2>
                <div class="user-info">
                    <div>
                        <span>Tên Tài Khoản:</span>
                        <span class="value" id="userName"><?=$user['ten_user']  ?></span>
                    </div>
                    <div>
                        <span>Email:</span>
                        <span class="value" id="userEmail"><?=$user['gmail']?></span>
                    </div>
                    <div>
                        <span>Số Điện Thoại:</span>
                        <span class="value" id="userPhone"><?=$user['phonenumber'] ?></span>
                    </div>
                    <div>
                        <span>Địa Chỉ:</span>
                        <span class="value" id="userAddress"><?=$user['address']?></span>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="donhang">
            <h1>Đơn hàng </h1>
            
        </div>
        <div id="giohang">

        </div>
        
    </div>
</main>
<?php
  echo json_encode($cart,JSON_FORCE_OBJECT); 
?>
<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav') ? document.querySelector('nav').offsetHeight + 10 + 'px' : '0px';

    const butts = [...document.querySelectorAll('button')];
    const contents = [...document.querySelector('.user_contenrs').children];
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
    })

</script>
