<?php
include_once("models/danhmuc.php");
include_once("models/hang.php");
$danhmuc=getAllDm();
$hang=getAllHang();
?>
<style>

    nav{
        align-items:center !important;
        position: fixed;
        top:0;
        z-index: 998;
        width: 100%;
        background-color: rgba(0, 0, 0, .1);
        height: 125px;
        transition: .4s;
        a.logo{
            width: 100%;
            height: 100%;
            grid-column: span 2;
            background: url('contents/imgs/logo/3.png') no-repeat center;
            background-size:  100%;
        }
        button,a{

            text-decoration: none;
            grid-column: span 2;
            background: none;
            color:white;
            font-size: 20px;
            text-align: center;
            border: none;
            cursor: pointer;
            svg{
                width: 30px;
            }
        }
        #cart{
            grid-column: 12/13;
        }
        #user{
            grid-column: 11/12;

        }
    }
    nav.active{
        background-color: #FF794C;
        a.logo{
            background: url('contents/imgs/logo/2.png') no-repeat center;
            background-size:  100%;

        }
    }
    #nav_menu_popover{
        position: fixed;
        height: 100vh;
        width: 25vw;
        inset: 0;
        left: 0 !important;
        margin: auto;
        border: none;
        padding: 0.25em;
        overflow: auto;
        flex-direction: column;
        a{
            color:black;
            text-decoration: none;
            padding: 10px 5px;
        }
        div{
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-radius: 50%;
            button{
                aspect-ratio: 1/1;
                height: 35px;
                margin: 10px;
                border-radius: 50%;
                border: 1px black solid ;
                cursor: pointer;
                background: none;
                transition: .6s;
            }
        }
        button:hover{
            transform: rotate(180deg);
        }
    }
    #nav_menu_popover:popover-open {
        display: flex;
        inset: unset;
        left:0;
    }
    #nav_menu_popover:popover-open + .filter{
        display: block;
    }
    .filter{
        width: 100vw;
        height: 100vh;
        position: fixed;
        color: black;
        top:0;
        left: 0;
        background-color: rgba(0, 0, 0,.3);
        z-index: 999;
        display: none;
        cursor: none;
        user-select: none;
        .cursor{
            display: none;
            justify-content: center;
            align-items: center;
            position: absolute;
            height: 50px;
            aspect-ratio: 1/1;
            border-radius: 50%;

            border: 2px solid black ;
            background-color: white;
        }
        .cursor.active{
            display: flex;
        }
    }
    #btn_search{
        margin: 0;
        grid-column: 8/11;
        input{
            background: #eee;
            border: none;
            /* margin: 8px 0; */
            padding: 10px 15px;
            /* font-size: 13px; */
            border-radius: 10px;
            width: 100%;
            outline: none;
        }
    
    }
</style>
<nav class="col12">
    <a href="?page=home" class="logo"></a>
    <button popovertarget="nav_menu_popover">Products</button>
    <a href="">About</a>
    <?php
      if(isset($_SESSION['role']) && $_SESSION['role']==1){
        echo "<a href='?page=admin'>Admin</a>";
      }else{
        echo"
            <form id='btn_search' method='get'>
                <input type='text'  hidden name='page' value='product'>
                <input type='text' hidden name='shoptype' value='name'>
                <input type='text'  onkeydown='searching(this,event)' name='shopId' placeholder='Search'>
            </form>
        ";
      }
    ?>
    <a href="?page=account" id="user">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="6" r="4" stroke="#fff" stroke-width="1.5"/>
            <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
    </a>
    <a href="?page=account&tag=cart" id="cart">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#fff" stroke-width="1.5"/>
            <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#fff" stroke-width="1.5"/>
            <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#fff" stroke-width="1.5"  stroke-linecap="round"/>
        </svg>
    </a>
</nav>
<div id="nav_menu_popover" popover>
    <div>
        <button popovertarget="nav_menu_popover">X</button>
    </div>  
    <h4>Danh mục</h4>
    <hr>
    <?php
        foreach($danhmuc as $itm){
            echo "<a href='?page=product&shoptype=danhmuc&shopId={$itm['id_danhmuc']}'>{$itm['ten_danhmuc']}</a>";
        }
    ?>
    <h4>Hãng</h4>
    <hr>
    <?php
        foreach($hang as $itm){
            echo "<a href='?page=product&shoptype=hang&shopId={$itm['id_hang']}'>{$itm['ten_hang']}</a>";
        }
    ?>
</div>

<div class="filter">
    <div class="cursor">X</div>
</div>


<script>
    function searching(el,event){
        // console.log(el.parentElement,event.keyCode );
        if(event.keyCode==13){
            el.parentElement.submit();
        }
        
        // if()
    }
    document.querySelector('.filter').addEventListener('mousemove',(e)=>{
        const curs = document.querySelector('.cursor');
        curs.style.top = e.y - curs.offsetWidth/2;
        curs.style.left = e.x - curs.offsetHeight/2;
        curs.classList.add('active');
    })
    document.querySelector('.filter').addEventListener('mouseleave',(e)=>{
        document.querySelector('.cursor').classList.remove('active');
    })
    function navbaronscroll(){
        const banner = document.querySelector('.banner');
        const nav = document.querySelector('nav');
        if(banner.getBoundingClientRect().bottom < nav.offsetHeight){
            nav.classList.add('active');
            nav.children[0].children[0].src= "./imgs/logo/2.png";
        }
        else{
            nav.classList.remove('active');
            nav.children[0].children[0].src= "./imgs/logo/3.png";
        }
        
    }
    const page = new URLSearchParams(window.location.search).get('page');
    const shoptype = new URLSearchParams(window.location.search).get('shoptype');
    if(page=='home' || (page=='product' && shoptype !=null && shoptype !='name' ) || page==null){
        document.body.onscroll = navbaronscroll;
    }else{
        document.querySelector('nav').classList.add('active');
    }
    
</script>