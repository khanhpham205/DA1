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
            a,button{
                border: 2px solid rgba(0, 0, 0, 0);
                background: none;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                border-radius: 2px;
                transition: 0.3s;
                text-align: start;
                color:inherit;
                text-decoration: none;
            }
            a.active,button.active{
                background-color: grey;
                color:white;
            }
        }
        .user_contents{
            min-height: 80vh;
            border-radius: 10px;
            grid-column:3/13 ;
            box-shadow: 0 0 5px black;
            h1{
                text-align: center;
            }
        }

        #logout{
            width: 100%;
            color:red;
        }
        #logout:hover{
            width: 100%;
            color:#fff;
            background-color: #c53030;
        }        
    }

</style>
<div class="user_tag">
    <a aria-valuetext="info"  href="?page=account&tag=info" >Thông Tin</a>
    <hr>
    <a aria-valuetext="bill"  href="?page=account&tag=bill" >Đơn Hàng</a>
    <a aria-valuetext="cart"  href="?page=account&tag=cart" >Giỏ Hàng</a>
    <form id="logout" method="POST" >
        <button name="logout">Đăng Xuất</button>
    </form>
</div>
<!-- <main class="col12">
    <div class="user_contents">
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
        <div id="giohang" >
            <h1>Giỏ Hàng Của Bạn</h1>
        </div>
    </div>
</main> -->
<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight + 10;
    const butts = [...document.querySelectorAll('a')];
    butts.forEach(e=>{
        if(e.getAttribute('aria-valuetext')==new URLSearchParams(window.location.search).get('tag')){
            e.classList.add('active')
        }
    })
</script>
