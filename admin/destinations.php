<?php
require 'check_admin.php';
require '../config/database.php';

$keyword = $_GET["keyword"] ?? "";

$sql = "SELECT destinations.*, categories.name AS category_name
        FROM destinations
        LEFT JOIN categories ON destinations.category_id = categories.id
        WHERE destinations.title LIKE ?
           OR destinations.location LIKE ?
           OR categories.name LIKE ?
        ORDER BY destinations.id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "%$keyword%",
    "%$keyword%",
    "%$keyword%"
]);

$destinations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý địa điểm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Travel Admin</a>

        <div>
            <a href="dashboard.php" class="btn btn-outline-light btn-sm">Dashboard</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Đăng xuất</a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Quản lý địa điểm du lịch</h2>

        <a href="destination_add.php" class="btn btn-success">
            + Thêm địa điểm
        </a>
    </div>

    <form method="GET" class="row mb-3">
        <div class="col-md-10">
            <input 
                type="text" 
                name="keyword" 
                class="form-control" 
                placeholder="Tìm theo tên, vị trí hoặc danh mục..."
                value="<?= htmlspecialchars($keyword) ?>"
            >
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                Tìm kiếm
            </button>
        </div>
    </form>

    <?php if (isset($_GET["msg"])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_GET["msg"]) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên địa điểm</th>
                        <th>Danh mục</th>
                        <th>Vị trí</th>
                        <th>Giá</th>
                        <th width="160">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($destinations) > 0): ?>
                        <?php foreach ($destinations as $item): ?>
                            <tr>
                                <td><?= $item["id"] ?></td>

                                <td>
                                    <img 
                                        src="../assets/images/<?= htmlspecialchars($item["image"]) ?>" 
                                        width="90"
                                        height="60"
                                        style="object-fit: cover;"
                                    >
                                </td>

                                <td><?= htmlspecialchars($item["title"]) ?></td>

                                <td><?= htmlspecialchars($item["category_name"]) ?></td>

                                <td><?= htmlspecialchars($item["location"]) ?></td>

                                <td><?= number_format($item["price"]) ?> VNĐ</td>

                                <td>
                                    <a 
                                        href="destination_edit.php?id=<?= $item["id"] ?>" 
                                        class="btn btn-warning btn-sm">
                                        Sửa
                                    </a>

                                    <a 
                                        href="destination_delete.php?id=<?= $item["id"] ?>" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa địa điểm này?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Không tìm thấy dữ liệu
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>