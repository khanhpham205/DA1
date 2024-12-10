<title>Thông Tin Tài Khoản</title>
<style>
    #formdoitt{
        justify-self: center;
        width: 90%;
        input{
            width: 100%;
        }
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

    <h1>Thông Tin Tài Khoản</h1>
    <form id="formdoitt" method="POST">
        <div>
            <label for="ten_user">Tên Tài Khoản:</label>
            <input type="text" id="ten_user" name="ten_user" value="<?= htmlspecialchars($user['ten_user']) ?>" required>
            <input type="text" id="id_user" name="id_user" hidden value="<?= htmlspecialchars($user['id_user']) ?>" required>
        </div>
        <div>
            <label for="email">Email:</label> <p>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['gmail']) ?>" required>
        </div>
        <div>
            <label for="phonenumber">Số Điện Thoại:</label>
            <input type="text" id="phonenumber" name="phonenumber" value="<?= htmlspecialchars($user['phonenumber']) ?>" required>
        </div>
        <div>
            <label for="address">Địa Chỉ:</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
        </div>
        <div>
            <button type="submit" name="doithongtin" >Lưu Thay Đổi</button>
        </div>
    </form>

