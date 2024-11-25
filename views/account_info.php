
<?php
require_once 'db_connection.php'; 

$user_id = $_SESSION['user']; 
$sql = "SELECT * FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_user = $_POST['ten_user'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email không hợp lệ.';
    } else {
        $update_sql = "UPDATE user SET ten_user = ?, gmail = ?, phonenumber = ?, address = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('ssssi', $ten_user, $email, $phonenumber, $address, $user_id);

        if ($update_stmt->execute()) {
            $_SESSION['success'] = 'Cập nhật thông tin thành công.';
            header('Location: index.php?page=account&tag=info'); 
            exit();
        } else {
            $error = 'Đã xảy ra lỗi khi cập nhật thông tin.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tài Khoản</title>
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
</head>
<body>
    <h1>Thông Tin Tài Khoản</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p class="alert"><?= $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="account_info.php">
        <div>
            <label for="ten_user">Tên Tài Khoản:</label>
            <input type="text" id="ten_user" name="ten_user" value="<?= htmlspecialchars($user['ten_user']) ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
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
            <button type="submit">Lưu Thay Đổi</button>
        </div>
    </form>
</body>
</html>
