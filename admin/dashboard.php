<?php
require 'check_admin.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

<h1>Dashboard Admin</h1>
<p>Xin chào: <?= $_SESSION["admin_name"] ?></p>
<a href="destinations.php">Quản lý địa điểm</a>
<br>
<a href="logout.php">Đăng xuất</a>

</body>
</html>