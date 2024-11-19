<style>

    input,select{
        background: #eee;
        border: none;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 13px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }
    main{
        #ten_sanpham{
            grid-column: 1/13;
        }
        #gia_sanpham{
            grid-column: span 4;
        }
        #giamgia_sanpham{
            grid-column:span 2;

        }
        .mota_sanpham{
            grid-column: span 6;
            grid-row: span 2;
            background-color: #272727;
            height: 100%;

        }
        #danhmuc{
            grid-column: span 3;
        }
        #hang{
            grid-column: span 3;

        }
        .formadd{
            /* align-items: end ; */
        }
    }
</style>

<main class="col12">
    <h1 class="full12col">Add <?=$type ?></h1>
    <form action="" class="formadd full12col col12">
        <input type="text"     id="ten_sanpham" name="ten_sp" placeholder="Product Name"        >
        <input type="number"   id="gia_sanpham" name="gia_sp" placeholder="Product Price"       >
        <input type="number"   id="giamgia_sanpham" name="gia_sp" placeholder="Product Discount"       >
        <div class="mota_sanpham"></div>
        <div id="danhmuc">
            <label for="danhmuc">Danh muc:</label>
            <select name="danhmuc"      name="danhmuc" >
                <?php
                  foreach($allDm as $dm){
                    echo "<option value='{$dm['id_danhmuc']}'>{$dm['ten_danhmuc']}</option>";
                  }
                ?>
            </select>
        </div>
        <div id="hang">
            <label for="hang">Hang:</label>
            <select name="hang"            name="hang"      >
                <?php
                  foreach($allHang as $hang){
                    echo "<option value='{$hang['id_hang']}'>{$hang['ten_hang']}</option>";
                  }
                ?>
            </select>
        </div>
        <hr>
        <!-- then option cho san pham -->
        <input type="text" placeholder="Option Title">
        <div class="full12col">
            <input type="button" value="" placeholder="Opion 1 Name">
        </div>
          
    </form>








</main>
<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
    
</script>