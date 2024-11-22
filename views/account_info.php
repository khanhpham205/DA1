<style>
    
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
<div id="thongtin">
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