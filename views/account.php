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

    button {
        background-color: #e53e3e;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        width: 100%;
        margin-top: 20px;
    }

    button:hover {
        background-color: #c53030;
    }

</style>
<?php
var_dump($user);
$user = [
    "id_user" => $user.["userID"],
    "ten_user" => $user.["userName"],
    "gmail" =>  ['gmail'],
    "phonenumber" => ['phonenumber'],
    "address" => ['address'],
    "avatar_url" => ['avatar_url']
];

if ($user) {
} else {
    echo 'Chưa đăng nhập';
}

?>
<main>
    <div class="container">
        <div class="card">
            <div class="avatar-container">
                <img src="<?= $user ? $user['avatar_url'] : 'https://via.placeholder.com/150' ?>" alt="Ảnh đại diện" class="avatar">
            </div>
            <h2>Thông Tin Tài Khoản</h2>
            <div class="user-info">
                <div>
                    <span>ID Tài Khoản:</span>
                    <span class="value" id="userID"><?= $user ? $user['id_user'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div>
                    <span>Tên Tài Khoản:</span>
                    <span class="value" id="userName"><?= $user ? $user['ten_user'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div>
                    <span>Email:</span>
                    <span class="value" id="userEmail"><?= $user ? $user['gmail'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div>
                    <span>Số Điện Thoại:</span>
                    <span class="value" id="userPhone"><?= $user ? $user['phonenumber'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div>
                    <span>Địa Chỉ:</span>
                    <span class="value" id="userAddress"><?= $user ? $user['address'] : 'Chưa đăng nhập' ?></span>
                </div>
            </div>

            <form method="POST">
                <button name="logout">Đăng Xuất</button>
            </form>
        </div>
    </div>
</main>

<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav') ? document.querySelector('nav').offsetHeight + 10 + 'px' : '0px';

    const user = <?php echo json_encode($user); ?>;
    if (user) {
        document.getElementById('userID').textContent = user.id_user;
        document.getElementById('userName').textContent = user.ten_user;
        document.getElementById('userEmail').textContent = user.gmail;
        document.getElementById('userAddress').textContent = user.address;
        document.getElementById('userPhone').textContent = user.phonenumber;
    } else {
        console.error("Không có thông tin người dùng.");
    }
</script>
