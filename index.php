<style>
    body{
        position: relative;
        margin: 0;
        padding: 0;
    }
    h1,h2,h3,h4,h5,h6,p{
        margin: 0;
        padding: 0;
    }
    .col12{
        display: grid;
        grid-template-columns: repeat(12,80px);
        justify-content: center;
        align-items: start;
        gap: 20px;
        hr{
            width: 100%;
            grid-column: 1/13 ;
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
    #notifi{
        box-shadow: 0 0 2px grey;
        position: fixed;
        border-radius: 5px;
        height: fit-content;
        width: 25vw;
        border: none;
        padding: 0.25em;
        /* top: 50% !important;
        left: 50% !important;
        transform: translate(-50%,-50%) !important; */
        overflow: auto;
        flex-direction: column;
        background-color: #272727;
        svg{
            height:100%;
            aspect-ratio: 1/1;
        }
        >div{
            height: 50px;
            display: none;
            align-items: center ;
        }
        >div.active{
            display:flex;
        }
        .warning{
            color:yellow;
        }
        .error{
            color:red;
        }
        .success{
            color:green;
        }
    }
    #notifi::-webkit-scrollbar{
        display: none;
    }
    #notifi:popover-open {
        display: flex;
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
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body> 
    <?php
        ob_start();
        session_start();
        include_once('controllers/adminController.php');
        include_once('controllers/pageController.php');
        $pageC = new PageController;
        $pageA = new AdminController;
        include_once('views/conponant_navbar.php');

        $page = (isset($_GET['page'])) ? $_GET['page']: null;
        switch($page){
        case 'home':
            $pageC->home();
            break;
        case 'account':
            if(isset($_SESSION['user']) && $_SESSION['user']!=null){
                $pageC->account($_SESSION['user']);
            }else{
                $pageC->register();
            }
            break;
        case 'product':
            if(isset($_GET['id'])){
                $pageC->spDetail($_GET['id']);
            }else{
                $pageC->products();
                // header("Refresh:0; url=index.php");
            }
            break;
        case 'admin':
            $pageA->home($_SESSION['user']);
            break;
        case 'admin_edit':
            $type = (isset($_GET['type'])) ? $_GET['type']: null;
            $id = (isset($_GET['id'])) ? $_GET['id']: null;
            $pageA->edit($_SESSION['user'],$type,$id);
            break;
        default:
            $pageC->home();
        }
    ?>
    <div id="notifi" popover >
        <div class="warning">
            <svg fill="yellow" viewBox="0 -8 528 528" xmlns="http://www.w3.org/2000/svg" ><path d="M264 56Q318 56 364 83 410 110 437 156 464 202 464 256 464 310 437 356 410 402 364 429 318 456 264 456 210 456 164 429 118 402 91 356 64 310 64 256 64 202 91 156 118 110 164 83 210 56 264 56ZM232 144L232 272 296 272 296 144 232 144ZM232 304L232 368 296 368 296 304 232 304Z" /></svg>
            <p> </p>
        </div>
        <div class="error">
            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="add" fill="red" transform="translate(42.666667, 42.666667)"><path d="M213.333333,3.55271368e-14 C331.136,3.55271368e-14 426.666667,95.5306667 426.666667,213.333333 C426.666667,331.136 331.136,426.666667 213.333333,426.666667 C95.5306667,426.666667 3.55271368e-14,331.136 3.55271368e-14,213.333333 C3.55271368e-14,95.5306667 95.5306667,3.55271368e-14 213.333333,3.55271368e-14 Z M262.250667,134.250667 L213.333333,183.168 L164.416,134.250667 L134.250667,164.416 L183.168,213.333333 L134.250667,262.250667 L164.416,292.416 L213.333333,243.498667 L262.250667,292.416 L292.416,262.250667 L243.498667,213.333333 L292.416,164.416 L262.250667,134.250667 Z" id="Combined-Shape"></path></g></g></svg>           
            <p></p>

        </div>
        
        <div class="success">
            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="add-copy" fill="green" transform="translate(42.666667, 42.666667)">
                        <path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M213.333333,384 C119.227947,384 42.6666667,307.43872 42.6666667,213.333333 C42.6666667,119.227947 119.227947,42.6666667 213.333333,42.6666667 C307.43872,42.6666667 384,119.227947 384,213.333333 C384,307.43872 307.438933,384 213.333333,384 Z M293.669333,137.114453 L323.835947,167.281067 L192,299.66912 L112.916693,220.585813 L143.083307,190.4192 L192,239.335893 L293.669333,137.114453 Z" id="Shape"></path>
                    </g>
                </g>
            </svg>
            <p></p>
        </div>
    </div>
    <script>
        const notifi = document.getElementById('notifi');
        var urlweb = new URLSearchParams(window.location.search);
        const no = [
            urlweb.get('warning'),
            urlweb.get('error'),
            urlweb.get('success')
        ]
        if(no[0]||no[1]||no[2]){
            notifi.children[0].children[1].innerText += no[0];
            notifi.children[1].children[1].innerText += no[1];
            notifi.children[2].children[1].innerText += no[2];

            // console.log(no);
            if(no[0]){
                notifi.children[0].classList.add('active');
            }
            if(no[1]){
                notifi.children[1].classList.add('active');
            }
            if(no[2]){
                notifi.children[2].classList.add('active');
            }
            notifi.showPopover();
            setTimeout(()=>{notifi.hidePopover()},5000)
        }
        
    </script>
</body>

