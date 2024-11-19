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
            height: 100%;
            border-radius: 5px;
            padding:10px;
            resize: none;

        }
        #danhmuc{
            grid-column: span 3;
        }
        #hang{
            grid-column: span 3;

        }
        input[type=file]{
            display: none;
        }
        .imglabel{
            background-color: #FF794C;
            color: #fff;
            border: 2px solid #FF794C;
            border-radius: 6px;
            padding: 6px;
        }
        .imglabel:hover{
            background: none;
            color: #FF794C;
        }

        .imgbox{
            height: fit-content;
            max-height: 100px;
            overflow: hidden;
            display: flex;
            >img{
                height: 80px;
                aspect-ratio: 1/1;
                border-radius: 6px;
                border: solid 1px grey;
                margin: 1px;
            }
        }
        .box_option{
            align-items: center;
            >label{
                text-align: center;
            }
        }
    }
</style>

<main class="col12">
    <h1 class="full12col">Add <?=$type ?></h1>
    <form action="" method="POST" id="addsp" class="formadd full12col col12">
        <input type="text"     id="ten_sanpham"     name="ten_sp" placeholder="Product Name">
        <input type="number"   id="gia_sanpham"     name="gia_sp" placeholder="Product Price">
        <input type="number"   id="giamgia_sanpham" name="giamgia_sp" placeholder="Product Discount" min="1" max="90">
        <textarea class="mota_sanpham"></textarea>
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
        <input type="text" style="grid-column:1/4;" name="optionname" placeholder="Option Title">
        <button onclick="addoption(event)">Add option items</button>
        <div class="full12col col12 box_option">
            <input type="text" style="grid-column: span 10;" name="option_item_name" placeholder="Opion Name">
            <label class="imglabel" style="grid-column: span 2;" for="imgupload">IMG Upload</label>
            <input type="file" id='imgupload' accept="image/*" name="option_item_imgs[]" multiple require onchange="imgview(this.parentElement.children[3],this)">
            <div class="imgbox full12col"></div>
        </div>
        
        <input type="submit" name="addproduct" class="full12col" value="Add Product">
    </form>

</main>
<script>
    var numOfOptions = 0;
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
    function imgview(blockimg,inputimgs){
        imgs=[...inputimgs.files]
        imgs.forEach(e => {
            let imgtag = document.createElement('img');
            imgtag.src = URL.createObjectURL(e);
            blockimg.append(imgtag);
        });
    }
    function addoption(e){
        e.preventDefault();
        const box =document.getElementById('addsp');
        textaa =`
            <div class="full12col col12 box_option">
                <input type="text" style="grid-column: span 10;" name="option_item_name${numOfOptions}" placeholder="Opion ${numOfOptions+1} Name">
                <label class="imglabel" style="grid-column: span 2;" for="imgupload${numOfOptions}">IMG Upload</label>
                <input type="file" id='imgupload${numOfOptions}' name="option_item_imgs${numOfOptions}[]"  accept="image/*" multiple require onchange="imgview(this.parentElement.children[3],this)">
                <div class="imgbox full12col"></div>
            </div>
        `;
        const btn_temp = box.children[box.children.length-1];        
        box.children[box.children.length-1].remove()
        box.innerHTML+=textaa;
        box.append(btn_temp);
        numOfOptions++;
    }
</script>