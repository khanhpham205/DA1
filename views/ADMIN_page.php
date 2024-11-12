<style>
    .col12{
        display: grid;
        grid-template-columns: repeat(12,80px);
        justify-content: center;
        /* align-items: center; */
        gap: 20px;
    }
    .full12col{
        grid-column:1/13;
    }
    .pricetag{
        color: red;
        font-weight: bold;
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
        button.delete{
            border: 2px solid red ;
            color :red;
        }
        button.edit{
            color :blue;
            border: 2px solid blue ;
        }
        button.edit:hover{
            background: blue !important;
            color:white;
        }
        button.delete:hover{
            color:white;
            background: red !important;
        }
        #thongke{

        }
        #sanpham{
            .admin_sanpham{
                display: grid;
                grid-template-columns: 150px 552px 88px 88px;
                /* grid-template-rows:  10px 110px; */
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
                button{
                    align-self: end;
                    justify-self: end;
                    width: 100%;
                    height: fit-content;
                    background: none;
                    border-radius: 20px;
                    font-size: 15px;
                }
                button.delete{
                    grid-column: 4/5;
                }
                button.edit{
                    grid-column: 3/4;
                }
            }
        }
        #danhmuc{
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
        #hang{
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
</style>
<body>
<nav>
    <a href="?">HOME</a>
</nav>
<main class="col12">
    <div class="admin_tag">
        <button aria-valuetext="thongke" class="active" >Thống Kê</button>
        <hr>
        <button aria-valuetext="sanpham">Sản Phẩm</button>
        <button aria-valuetext="danhmuc">Danh Mục</button>
        <button aria-valuetext="hang">Hãng</button>
    </div>
    <div class="admin_contents">
        <div class="active" id="thongke">
            <h1>Thong ke</h1>
            <!-- <form action="">
            </form> -->
        </div>
        <div id="sanpham">
            <h1>Sản Phẩm</h1>
            <a href="" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <!-- <h3>Them San Pham</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Name" name="name" id="addpdname"required>
                <input type="number" min="1" name="cost" placeholder="Cost" oninput="validity.valid||(value=0);"required>
                <input type="number" name="discount" placeholder="discount (max 90) %" max="90" oninput="validity.valid||(value=0)">
                <select name="danhmuc">
                    <option value="chuot">chuot</option>
                    <option value="ban phim">ban phim</option>
                    <option value="tai nghe">tai nghe</option>
                </select>
                <input type="file" accept="image/*" name="image" multiple required>
                <input type="submit" name="AddPd" value="Thêm Sản Phẩm">
            </form> -->
            <div class="admin_sanpham">
                <img src="https://mtek3d.com/wp-content/uploads/2018/01/image-placeholder-500x500.jpg">
                <h3>ten san pham ten san pham ten san pham ten san phamten san phamten san pham ten san pham ten san pham ten san pham ten san pham  <br><p class="pricetag">250.000đ</p></h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_sanpham">
                <img src="https://mtek3d.com/wp-content/uploads/2018/01/image-placeholder-500x500.jpg">
                <h3>ten san pham ten san pham ten san pham ten san phamten san phamten san pham ten san pham ten san pham ten san pham ten san pham  <br><p class="pricetag">250.000đ</p></h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_sanpham">
                <img src="https://mtek3d.com/wp-content/uploads/2018/01/image-placeholder-500x500.jpg">
                <h3>ten san pham ten san pham ten san pham ten san phamten san phamten san pham ten san pham ten san pham ten san pham ten san pham  <br><p class="pricetag">250.000đ</p></h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_sanpham">
                <img src="https://mtek3d.com/wp-content/uploads/2018/01/image-placeholder-500x500.jpg">
                <h3>ten san pham ten san pham ten san pham ten san phamten san phamten san pham ten san pham ten san pham ten san pham ten san pham  <br><p class="pricetag">250.000đ</p></h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
        </div>
        <div id="danhmuc">
            <h1>Danh Mục</h1>
            <a href="" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
            <div class="admin_danhmuc">
                <h3>ten danh muc</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
        </div>
        <div id="hang">
            <h1>Hãng</h1>
            <a href="" class="addbutn">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                </svg>
                <p>Add</p>
            </a>
            <hr>
            <div class="admin_hang">
                <h3>ten hang</h3>
                <button class="edit">edit</button>
                <button class="delete">delete</button>
            </div>
        </div>
    </div>
</main>

<script>
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
    })


</script>
</body>
