<?php
session_start();
require '../config/database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $password == "") {
        $error = "Vui lòng nhập đầy đủ tài khoản và mật khẩu";
    } else {

        $sql = "SELECT * FROM users WHERE username = ? AND role = 'admin'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {

            $_SESSION["admin_id"] = $user["id"];
            $_SESSION["admin_name"] = $user["fullname"];

            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Sai tài khoản hoặc mật khẩu";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="col-md-4 mx-auto card shadow p-4">

        <h3 class="text-center mb-4">Đăng nhập Admin</h3>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Tài khoản</label>
                <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản">
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Đăng nhập
            </button>

        </form>

    </div>

</div>

</body>
</html>