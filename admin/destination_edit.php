<?php
require 'check_admin.php';
require '../config/database.php';

$id = $_GET["id"] ?? 0;

$sql = "SELECT * FROM destinations WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$destination = $stmt->fetch();

if (!$destination) {
    header("Location: destinations.php?msg=Không tìm thấy địa điểm");
    exit;
}

/* Lấy danh sách danh mục */
$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();

$error = "";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa địa điểm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>✏️ Sửa địa điểm du lịch</h3>
        </div>

        <div class="card-body">

            <?php if ($error != ""): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>Tên địa điểm</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control"
                        value="<?= htmlspecialchars($destination["title"]) ?>">
                </div>

                <div class="mb-3">
                    <label>Danh mục</label>
                    <select name="category_id" class="form-select">
                        <?php foreach ($categories as $category): ?>
                            <option 
                                value="<?= $category["id"] ?>"
                                <?= $category["id"] == $destination["category_id"] ? "selected" : "" ?>>
                                <?= htmlspecialchars($category["name"]) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Địa điểm</label>
                    <input 
                        type="text" 
                        name="location" 
                        class="form-control"
                        value="<?= htmlspecialchars($destination["location"]) ?>">
                </div>

                <div class="mb-3">
                    <label>Giá</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control"
                        value="<?= htmlspecialchars($destination["price"]) ?>">
                </div>

                <div class="mb-3">
                    <label>Ảnh hiện tại</label><br>
                    <img 
                        src="../assets/images/<?= htmlspecialchars($destination["image"]) ?>" 
                        width="150"
                        style="object-fit: cover;">
                </div>

                <div class="mb-3">
                    <label>Đổi ảnh mới nếu muốn</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Mô tả</label>
                    <textarea 
                        name="description" 
                        rows="5" 
                        class="form-control"><?= htmlspecialchars($destination["description"]) ?></textarea>
                </div>

                <button class="btn btn-warning">
                    Cập nhật
                </button>

                <a href="destinations.php" class="btn btn-secondary">
                    Quay lại
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>