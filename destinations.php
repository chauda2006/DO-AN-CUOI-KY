<?php

$keyword = $_GET['keyword'] ?? '';
$region = $_GET['region'] ?? '';

$destinations = [
    [
        'id' => 1,
        'name' => 'Đà Lạt',
        'location' => 'Lâm Đồng',
        'region' => 'mien-nam',
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
        'image' => 'trangan.jpg',
        'price' => 1800000,
        'description' => 'Tràng An nổi bật với cảnh quan núi đá vôi, sông nước và các hang động tự nhiên.'
    ],
    [
        'id' => 5,
        'name' => 'Đà Nẵng',
        'location' => 'Đà Nẵng',
        'region' => 'mien-trung',
        'image' => 'drf.jpg',
        'price' => 3200000,
        'description' => 'Đà Nẵng là thành phố biển hiện đại với cầu Rồng, Bà Nà Hills và bãi biển Mỹ Khê.'
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách địa điểm du lịch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/destinations.css?v=1">
</head>

<body class="destination-page">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-airplane-engines"></i> Travel Việt Nam
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="destinations.php">Địa điểm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/login.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="destination-banner">
    <div class="container text-center">
        <h1>Khám phá địa điểm du lịch</h1>
        <p>Tìm kiếm những điểm đến nổi bật cho chuyến đi của bạn</p>
    </div>
</section>

<section class="container destination-section">

    <form method="GET" class="destination-filter shadow">
        <div class="row g-3 align-items-center">

            <div class="col-lg-7 col-md-6">
                <input
                    type="text"
                    name="keyword"
                    class="form-control form-control-lg"
                    placeholder="Nhập tên địa điểm, tỉnh thành hoặc mô tả..."
                    value="<?= htmlspecialchars($keyword) ?>">
            </div>

            <div class="col-lg-3 col-md-4">
                <select name="region" class="form-select form-select-lg">
                    <option value="">Tất cả vùng miền</option>
                    <option value="mien-bac" <?= $region == 'mien-bac' ? 'selected' : '' ?>>Miền Bắc</option>
                    <option value="mien-trung" <?= $region == 'mien-trung' ? 'selected' : '' ?>>Miền Trung</option>
                    <option value="mien-nam" <?= $region == 'mien-nam' ? 'selected' : '' ?>>Miền Nam</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-2">
                <button class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-search"></i> Tìm
                </button>
            </div>

        </div>
    </form>

    <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
        <h2 class="section-title">Danh sách địa điểm</h2>
        <span class="badge bg-primary fs-6">
            <?= count($filteredDestinations) ?> kết quả
        </span>
    </div>

    <div class="row">

        <?php if (count($filteredDestinations) > 0): ?>

            <?php foreach ($filteredDestinations as $item): ?>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card destination-card h-100">

                        <div class="destination-img-box">
                            <img
                                src="assets/images/<?= htmlspecialchars($item['image']) ?>"
                                class="card-img-top"
                                alt="<?= htmlspecialchars($item['name']) ?>">

                            <span class="destination-category">
                                <?= htmlspecialchars($item['location']) ?>
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column">

                            <h4 class="card-title">
                                <?= htmlspecialchars($item['name']) ?>
                            </h4>

                            <p class="destination-location">
                                <i class="bi bi-geo-alt-fill"></i>
                                <?= htmlspecialchars($item['location']) ?>
                            </p>

                            <p class="card-text">
                                <?= htmlspecialchars($item['description']) ?>
                            </p>

                            <div class="destination-price mt-auto">
                                <?= number_format($item['price'], 0, ',', '.') ?> VNĐ
                            </div>

                            <a
                                href="detail.php?id=<?= $item['id'] ?>"
                                class="btn btn-outline-primary w-100 mt-3">
                                Xem chi tiết
                            </a>

                        </div>

                    </div>
                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Không tìm thấy địa điểm phù hợp.
                </div>
            </div>

        <?php endif; ?>

    </div>

</section>

<footer class="footer text-center">
    <div class="container">
        <p>© 2026 Travel Việt Nam - Website du lịch</p>
    </div>
</footer>
<button id="backToTop" class="back-to-top">
    <i class="bi bi-arrow-up"></i>
</button>
<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>