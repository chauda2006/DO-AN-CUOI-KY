<?php
$keyword = $_GET['keyword'] ?? '';
$region = $_GET['region'] ?? '';

$destinations = [
    [
        'id' => 1,
        'name' => 'Đà Lạt',
        'location' => 'Lâm Đồng',
        'region' => 'mien-trung',
        'image' => 'dalat.jpg',
        'price' => 2500000,
        'description' => 'Đà Lạt nổi tiếng với khí hậu mát mẻ, rừng thông, hồ nước và các địa điểm check-in tuyệt đẹp.'
    ],
    [
        'id' => 2,
        'name' => 'Hội An',
        'location' => 'Quảng Nam',
        'region' => 'mien-trung',
        'image' => 'hoian.jpg',
        'price' => 2200000,
        'description' => 'Hội An là phố cổ nổi tiếng với kiến trúc cổ kính, đèn lồng và nền ẩm thực đặc sắc.'
    ],
    [
        'id' => 3,
        'name' => 'Phú Quốc',
        'location' => 'Kiên Giang',
        'region' => 'mien-nam',
        'image' => 'phuquoc.jpg',
        'price' => 4500000,
        'description' => 'Phú Quốc là đảo ngọc với biển xanh, cát trắng, khu nghỉ dưỡng và nhiều hoạt động vui chơi.'
    ],
    [
        'id' => 4,
        'name' => 'Tràng An',
        'location' => 'Ninh Bình',
        'region' => 'mien-bac',
        'image' => 'tranan1.jpg',
        'price' => 1800000,
        'description' => 'Tràng An nổi bật với cảnh quan núi đá vôi, sông nước và các hang động tự nhiên.'
    ],
    [
        'id' => 5,
        'name' => 'Đà Nẵng',
        'location' => 'Đà Nẵng',
        'region' => 'mien-trung',
        'image' => 'danang1.jpg',
        'price' => 3200000,
        'description' => 'Đà Nẵng là thành phố biển hiện đại với cầu Rồng, Bà Nà Hills và bãi biển Mỹ Khê.'

    ],
    [
        'id' => 6,
        'name' => 'Cà Mau',
        'location' => 'Cà Mau',
        'region' => 'mien-nam',
        'image' => 'camau1.jpg',
        'price' => 2900000,
        'description' => 'Cà Mau là vùng đất mũi cực Nam Tổ quốc, nổi tiếng với rừng ngập mặn hoang sơ, chợ nổi và cua Cà Mau siêu ngon.'
    ],
    [
        'id' => 7,
        'name' => 'Sa Pa',
        'location' => 'Lào Cai',
        'region' => 'mien-bac',
        'image' => 'sapa1.jpg',
        'price' => 3500000,
        'description' => 'Sa Pa là thị trấn mờ sương, nổi tiếng với đỉnh Fansipan hùng vĩ, ruộng bậc thang kỳ vĩ và bản sắc văn hóa độc đáo.'
    ],
    [
        'id' => 8,
        'name' => 'Vịnh Hạ Long',
        'location' => 'Quảng Ninh',
        'region' => 'mien-bac',
        'image' => 'halong1.jpg',
        'price' => 3800000,
        'description' => 'Vịnh Hạ Long là di sản thiên nhiên thế giới với hàng ngàn hòn đảo đá vôi kỳ vĩ mọc lên từ làn nước biển xanh ngọc bích.'
    ],
    [
        'id' => 9,
        'name' => 'Cần Thơ',
        'location' => 'Cần Thơ',
        'region' => 'mien-nam',
        'image' => 'cantho1.webp',
        'price' => 1900000,
        'description' => 'Cần Thơ gạo trắng nước trong, nổi tiếng với nét đẹp văn hóa chợ nổi sông nước, các miệt vườn trĩu quả và bến Ninh Kiều thơ mộng.'
    ]



];

$filteredDestinations = array_filter($destinations, function ($item) use ($keyword, $region) {
    $matchKeyword = true;
    $matchRegion = true;

    if ($keyword !== '') {
        $text = mb_strtolower($item['name'] . ' ' . $item['location'] . ' ' . $item['description'], 'UTF-8');
        $searchText = mb_strtolower($keyword, 'UTF-8');
        $matchKeyword = mb_strpos($text, $searchText) !== false;
    }

    if ($region !== '') {
        $matchRegion = $item['region'] === $region;
    }

    return $matchKeyword && $matchRegion;
});
?>

<!DOCTYPE html>
<html lang="vi">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh sách địa điểm du lịch</title>

<!-- ✅ Bootstrap chuẩn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ✅ Icon -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/destinations.css?v=<?php echo filemtime('assets/css/destinations.css'); ?>">
<style>
body {
    color: #fff;
}
#bg-video {
    position: fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    object-fit: cover;
    z-index:-1;
}
.overlay {
    position: fixed;
    width:100%;
    height:100%;
    background: rgba(4, 237, 234, 0.59);
    z-index:-1;
}
.card {
    border-radius: 15px;
}
</style>

</head>

<body>

<div class="overlay"></div>

<!-- VIDEO -->
<video autoplay muted loop playsinline id="bg-video">
    <source src="assets/videos/nen01.mp4" type="video/mp4">
</video>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- LOGO (click về trang chủ) -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/images/logo.png" alt="Logo"
                 style="height:50px; margin-right:10px; transition:0.3s;">

            <div>
                <span style="font-weight:bold; color:#fff;">
                    Royal Vietnam Guide
                </span><br>

                <small style="color:#fff; opacity:0.8; font-size:11px;">
                    Du lịch với chúng tôi
                </small>
            </div>
        </a>



        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Điểm đến</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
                <a class="btn btn-success" href="detail.php">
                    <i class="bi bi-calendar-check"></i> chi tiết</a>
                <!-- Đặt nút này ở nơi bạn muốn hiển thị trên thanh menu -->
                 <button id="themeToggle" class="theme-btn">🌙 Chế độ tối</button>
            </ul>
        </div>
    </div>
</nav>

<!-- TITLE -->
<div class="container text-center" style="margin-top:120px;">
    <h1>Khám phá địa điểm du lịch</h1>
</div>

<div class="container mt-5">

<!-- FILTER -->
<form method="GET" class="bg-dark p-4 rounded mb-4">
    <div class="row g-3">
        <div class="col-md-7">
            <input type="text" name="keyword" class="form-control"
                placeholder="Tìm kiếm..."
                value="<?= htmlspecialchars($keyword) ?>">
        </div>

        <div class="col-md-3">
            <select name="region" class="form-select">
                <option value="">Tất cả</option>
                <option value="mien-bac" <?= $region=='mien-bac'?'selected':'' ?>>Miền Bắc</option>
                <option value="mien-trung" <?= $region=='mien-trung'?'selected':'' ?>>Miền Trung</option>
                <option value="mien-nam" <?= $region=='mien-nam'?'selected':'' ?>>Miền Nam</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                <i class="bi bi-search"></i> Tìm
            </button>
        </div>
    </div>
</form>

<!-- RESULT -->
<h4><?= count($filteredDestinations) ?> kết quả</h4>

<div class="row mt-3">
<?php if(count($filteredDestinations)>0): ?>
    <?php foreach($filteredDestinations as $item): ?>
        <div class="col-md-4 mb-4">
            <div class="card text-dark h-100 shadow">

                <img src="assets/images/<?= $item['image'] ?>"
                     style="height:200px; object-fit:cover;">

                <div class="card-body d-flex flex-column">
                    <h5><?= $item['name'] ?></h5>
                    <small class="text-muted"><?= $item['location'] ?></small>

                    <p class="mt-2"><?= $item['description'] ?></p>

                    <b class="text-danger mt-auto">
                        <?= number_format($item['price']) ?> đ
                    </b>

                    <a href="detail.php?id=<?= $item['id'] ?>"
                       class="btn btn-outline-primary mt-3">
                        Xem chi tiết
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Không tìm thấy kết quả</p>
<?php endif; ?>
</div>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Liên kết JavaScript tự động xóa bộ nhớ đệm khi có thay đổi code -->
<script src="assets/js/script.js?v=<?php echo filemtime('assets/js/script.js'); ?>"></script>


</body>
</html>