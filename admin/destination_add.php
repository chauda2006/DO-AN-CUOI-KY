<?php
require 'check_admin.php';
require '../config/database.php';

/* Lấy danh sách danh mục */
$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>

<meta charset="UTF-8">

<title>Thêm địa điểm</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>➕ Thêm địa điểm du lịch</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Tên địa điểm</label>

<input
type="text"
name="title"
class="form-control">

</div>

<div class="mb-3">

<label>Danh mục</label>

<select
name="category_id"
class="form-select">

<?php foreach($categories as $category): ?>

<option
value="<?= $category["id"] ?>">

<?= $category["name"] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Địa điểm</label>

<input
type="text"
name="location"
class="form-control">

</div>

<div class="mb-3">

<label>Giá</label>

<input
type="number"
name="price"
class="form-control">

</div>

<div class="mb-3">

<label>Ảnh</label>

<input
type="file"
name="image"
class="form-control">

</div>

<div class="mb-3">

<label>Mô tả</label>

<textarea
name="description"
rows="5"
class="form-control"></textarea>

</div>

<button class="btn btn-success">

Lưu địa điểm

</button>

<a
href="destinations.php"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

</div>

</div>

</body>
</html>