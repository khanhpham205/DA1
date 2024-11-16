<style>
    .avatar {
        width: 128px;
        height: 128px;
        border-radius: 50%;
    }
</style>
<?php

// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=duan1', 'root', ''); 
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
// } catch (PDOException $e) {
//     die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
// }

// if (isset($_SESSION['id_user'])) {
//     $user_id = $_SESSION['id_user'];
//     $stmt = $pdo->prepare("SELECT id_user, ten_user, gmail, address, phonenumber, password FROM users WHERE id_user = :user_id");
//     $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
//     $stmt->execute();
//     $user = $stmt->fetch(PDO::FETCH_ASSOC);
// } else {
//     $user = null;
// }
var_dump($user);
?>
    

<main class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto pt-8 pb-8">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-center">
                <img src="<?= $user ? $user['avatar_url'] : 'https://via.placeholder.com/150' ?>" alt="Ảnh đại diện" class="avatar">
            </div>
            <h2 class="text-2xl font-bold text-center text-gray-800 mt-4">Thông Tin Tài Khoản</h2>
            <div class="mt-6 space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">ID Tài Khoản:</span>
                    <span id="userID" class="text-gray-800 font-semibold"><?= $user ? $user['id_user'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Tên Tài Khoản:</span>
                    <span id="userName" class="text-gray-800 font-semibold"><?= $user ? $user['ten_user'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Email:</span>
                    <span id="userEmail" class="text-gray-800 font-semibold"><?= $user ? $user['gmail'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Số Điện Thoại:</span>
                    <span id="userPhone" class="text-gray-800 font-semibold"><?= $user ? $user['phonenumber'] : 'Chưa đăng nhập' ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Địa Chỉ:</span>
                    <span id="userAddress" class="text-gray-800 font-semibold"><?= $user ? $user['address'] : 'Chưa đăng nhập' ?></span>
                </div>
            </div>
        </div>

        <form method="POST">
            <button name="logout" class="mt-6 bg-red-500 text-white py-2 px-4 rounded">Đăng Xuất</button>
        </form>
    </div>

</main>
<script>
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
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
