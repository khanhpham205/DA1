<style>
    body{
        margin: 0;
        padding: 0;
        /* background-color: #272727; */
    }
    .banner{
        position: relative;
        cursor: none;
        user-select: none;
        height: 80vh;
        background-size: cover;
        background: url('./imgs/banner (1).png') no-repeat center;
        #handlebannerimg{
            margin: 3%;
            position: absolute;
            bottom: 0;
            right: 0;
            button{
            user-select: none;
            position: relative;
            background: none;
            border: none;
                svg{
                    width: 30px;
                    aspect-ratio: 1/1;
                    transform: rotate(-90deg);
                    border-radius: 50%;
                    border:solid grey 1px; 
                    circle{
                        height: 100%;
                        width: 100%;
                        aspect-ratio: 1/1;
                        stroke-width: 3;
                        stroke:none;
                        fill:none;
                        stroke-Linecap: round;  
                        stroke-dasharray: 305%;
                        stroke-dashoffset:301%;   
                        animation:none;
                    }   
                    circle.active{
                        stroke:white;
                        animation: loading 3.99s linear infinite ;
                    }
                }
                span.bannerspan.active{
                    color:white;
                }
                span.bannerspan{
                    color:grey;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%,-50%);
                }
                
            }
        }
        
    }       
    #bannercursor{
        opacity: 1;
        position: absolute;
        border-radius: 50%;
        z-index: inherit;
        user-select: none;
        svg{
            border-radius: 50%;
            transform: rotate(-90deg);
            circle{
                stroke-width: 5;
                stroke:black;
                fill:white;
                stroke-Linecap: round;  
                stroke-dasharray: 305%;
                animation: none;
            }
            circle.active{
                animation: loading 3.99s linear infinite ;
            }
        }
        span.bannerspan{
            color: grey;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
    }
    #bannercursor.hide{
        opacity: 0;
        z-index: -999;
    }

    @keyframes loading{
        0%,100%{
            stroke-dashoffset: 301%;
        }
        99%{          
            stroke-dashoffset: 0;
        }
    }
</style>

<div class="banner">
    <div id="handlebannerimg">
        <button onclick="changebanner(0)">
            <svg>
                <circle r="15" cx="50%" cy="50%"></circle>
            </svg>
            <span class="bannerspan">1</span>
        </button>
        <button onclick="changebanner(1)">
            <svg>
                <circle r="15" cx="50%" cy="50%"></circle>
            </svg>
            <span class="bannerspan">2</span>
        </button>
        <button onclick="changebanner(2)">
            <svg>
                <circle r="15" cx="50%" cy="50%"></circle>
            </svg>
            <span class="bannerspan">3</span>
        </button>
        <button onclick="changebanner(3)">
            <svg>
                <circle r="15" cx="50%" cy="50%"></circle>
            </svg>
            <span class="bannerspan">4</span>
        </button>
        <button onclick="changebanner(4)">
            <svg>
                <circle r="15" cx="50%" cy="50%"></circle>
            </svg>
            <span class="bannerspan">5</span>
        </button>
    </div>
    <div id="bannercursor" class="hide">
        <svg width="50" height="50">
            <circle class="active" r="25" cx="50%" cy="50%"></circle>
        </svg>
        <span class="bannerspan">></span>
    </div>
</div>

<script>
    const banner = document.getElementById('handlebannerimg');
    let ban=0;

    const cur = document.getElementById('bannercursor');
    
    cur.addEventListener('click',()=>{
        changebanner(undefined,cur.getAttribute('aria-valuetext'))
    })
    
    banner.parentElement.addEventListener('mousemove',(e)=>{
        cur.classList.remove('hide')
        cur.style.left=e.pageX - cur.offsetHeight/2;
        cur.style.top=e.pageY - cur.offsetHeight/2;  
        const bannerpo = {
            x : banner.parentElement.offsetLeft,
            x1 : banner.parentElement.offsetLeft + banner.parentElement.offsetWidth,
            y : banner.parentElement.offsetTop,
            y1 : banner.parentElement.offsetTop + banner.parentElement.offsetHeight
        };
        const bannerhandlepo = {
            x : banner.offsetLeft,
            x1 : banner.offsetLeft + banner.offsetWidth,
            y : banner.offsetTop,
            y1 : banner.offsetTop + banner.offsetHeight
        };     

        if(!banner_check_po(e.pXage,e.pageY,bannerpo,bannerhandlepo)){
            cur.classList.add('hide')
        }
        cur.children[1].innerText= (e.x<(bannerpo.x1/2) && e.x > bannerpo.x) && '<'||'>';
        cur.ariaValueText= (e.x<(bannerpo.x1/2) && e.x > bannerpo.x) && '-1'||'1';
    })
    banner.parentElement.addEventListener('mouseleave',(e)=>{
        document.getElementById('bannercursor').classList.add('hide');  
    })

    function banner_check_po(x,y,b_po,bhandle_po){
        const po1 = x<b_po.x || x>b_po.x1 || y<b_po.y || y>b_po.y1;
        const po2 = x<bhandle_po.x || x>bhandle_po.x1 || y<bhandle_po.y || y>bhandle_po.y1;
        if(po1 + po2 == 1 ){
            return true;
        }else{
            return false
        }
    }

    const bannerlist = [
        'banner (1).png',
        'banner (2).png',
        'banner1.webp',
        'banner (4).png',
        'banner (5).png'
    ]

    function changebanner(num,turn){     
        //______________Remove old______________ 
        banner.children[ban].children[0].children[0].classList.remove('active');
        banner.children[ban].children[1].classList.remove('active');
        cur.children[0].children[0].classList.remove('active');  
        //=======================================

        if([0,1,2,3,4].includes(num)){
            ban=num;
        }
        else if (turn){
            ban +=  Number(turn);
        }
        else{
            ban++;
        }

        if(ban>4){
            ban=0
        }
        else if (ban <0){
            ban=4
        }
        const imgban = bannerlist[ban];
        banner.parentElement.style.background=`url('contents/imgs/banner/${imgban}') no-repeat center`;
        
        //______________Set new______________
        banner.children[ban].children[0].children[0].classList.add('active');
        banner.children[ban].children[1].classList.add('active');
        setTimeout(()=>cur.children[0].children[0].classList.add('active'),0)
        //===================================
        banner_timer=0;
    }
    var banner_timer=4
    changebanner(0);
    setInterval(function(){
        banner_timer++;
        if(banner_timer>=4){
            banner_timer=0;
            changebanner();
        }
        
    },1000)
</script>
<!-- phải bỏ trong tag body ko thì lỗi chỉ có 2 svg đc hiển thị -->