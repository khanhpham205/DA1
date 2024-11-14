<style>
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
    #notifi{
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
</style>
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
            if(isset($_SESSION['user']) && $_SESSION['user']){
                $pageC->account($_SESSION['user']);
            }else{
                $pageC->register();
            }
            break;
        case 'product':
            if(isset($_GET['id'])){
                $pageC->spDetail($_GET['id']);
            }else{
                header("Refresh:0; url=index.php");
            }
            break;
        case 'admin':
            $pageA->home($_SESSION['user']);
            break;
        default:
            $pageC->home();
        }
    ?>
    <div id="notifi" popover>
        <div class="warning"></div>
        <div class="error"></div>
        <div class="success"></div>
    </div>
    <script>
        const notifi = document.getElementById('notifi');
        const urlweb = new URLSearchParams(window.location.search);
        const no = [
            urlweb.get('warning'),
            urlweb.get('error'),
            urlweb.get('success')
        ]
        console.log(no);

        
    </script>
</body>

