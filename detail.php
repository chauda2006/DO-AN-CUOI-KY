<?php
$id = $_GET['id'] ?? 0;

$destinations = [
    [
        'id' => 1,
        'name' => 'Đà Lạt',
        'location' => 'Lâm Đồng',
        'region' => 'Miền Nam',
        'image' => 'dalat.jpg',
        'price' => 2500000,
        'time' => '3 ngày 2 đêm',
        'description' => 'Đà Lạt nổi tiếng với khí hậu mát mẻ quanh năm, rừng thông xanh, hồ nước thơ mộng và những địa điểm check-in hấp dẫn. Đây là điểm đến phù hợp cho du khách yêu thích sự yên bình, lãng mạn và thiên nhiên.',
        'highlights' => ['Hồ Xuân Hương', 'Quảng trường Lâm Viên', 'Langbiang', 'Chợ đêm Đà Lạt']
    ],
    [
        'id' => 2,
        'name' => 'Hội An',
        'location' => 'Quảng Nam',
        'region' => 'Miền Trung',
        'image' => 'hoian.jpg',
        'price' => 2200000,
        'time' => '2 ngày 1 đêm',
        'description' => 'Hội An là phố cổ nổi tiếng với kiến trúc cổ kính, những con đường đèn lồng đầy màu sắc và nền ẩm thực đặc sắc. Nơi đây mang vẻ đẹp yên bình, hoài cổ và rất phù hợp để tham quan, chụp ảnh.',
        'highlights' => ['Chùa Cầu', 'Phố cổ Hội An', 'Sông Hoài', 'Làng rau Trà Quế']
    ],
    [
        'id' => 3,
        'name' => 'Phú Quốc',
        'location' => 'Kiên Giang',
        'region' => 'Miền Nam',
        'image' => 'phuquoc.jpg',
        'price' => 4500000,
        'time' => '4 ngày 3 đêm',
        'description' => 'Phú Quốc được mệnh danh là đảo ngọc của Việt Nam với biển xanh, cát trắng, nắng vàng và nhiều khu nghỉ dưỡng hiện đại. Đây là lựa chọn lý tưởng cho các chuyến du lịch nghỉ dưỡng.',
        'highlights' => ['Bãi Sao', 'VinWonders Phú Quốc', 'Grand World', 'Chợ đêm Phú Quốc']
    ],
    [
        'id' => 4,
        'name' => 'Tràng An',
        'location' => 'Ninh Bình',
        'region' => 'Miền Bắc',
        'image' => 'trangan.jpg',
        'price' => 1800000,
        'time' => '1 ngày',
        'description' => 'Tràng An nổi bật với cảnh quan núi đá vôi, sông nước và các hang động tự nhiên. Đây là khu du lịch sinh thái nổi tiếng, được nhiều du khách trong và ngoài nước yêu thích.',
        'highlights' => ['Khu sinh thái Tràng An', 'Hang Múa', 'Chùa Bái Đính', 'Tam Cốc']
    ],
    [
        'id' => 5,
        'name' => 'Đà Nẵng',
        'location' => 'Đà Nẵng',
        'region' => 'Miền Trung',
        'image' => 'drf.jpg',
        'price' => 3200000,
        'time' => '3 ngày 2 đêm',
        'description' => 'Đà Nẵng là thành phố biển hiện đại, năng động với nhiều địa điểm nổi tiếng như cầu Rồng, Bà Nà Hills và bãi biển Mỹ Khê. Đây là điểm đến phù hợp cho cả gia đình và nhóm bạn.',
        'highlights' => ['Cầu Rồng', 'Bà Nà Hills', 'Biển Mỹ Khê', 'Ngũ Hành Sơn']
    ]
];

$currentDestination = null;

foreach ($destinations as $destination) {
    if ($destination['id'] == $id) {
        $currentDestination = $destination;
        break;
    }
}

if ($currentDestination == null) {
    header('Location: destinations.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($currentDestination['name']) ?> - Chi tiết địa điểm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="destination-detail-page">

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

<section class="detail-hero">
    <div class="detail-overlay">
        <div class="container">
            <h1><?= htmlspecialchars($currentDestination['name']) ?></h1>
            <p>
                <i class="bi bi-geo-alt-fill"></i>
                <?= htmlspecialchars($currentDestination['location']) ?>
            </p>
        </div>
    </div>
</section>

<section class="container detail-section">
    <div class="row g-4">

        <div class="col-lg-7">
            <div class="detail-image-box">
                <img 
                    src="assets/images/<?= htmlspecialchars($currentDestination['image']) ?>"
                    alt="<?= htmlspecialchars($currentDestination['name']) ?>">
            </div>
        </div>

        <div class="col-lg-5">
            <div class="detail-info-card">

                <span class="detail-region">
                    <?= htmlspecialchars($currentDestination['region']) ?>
                </span>

                <h2><?= htmlspecialchars($currentDestination['name']) ?></h2>

                <div class="detail-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>4.5/5</span>
                </div>

                <p class="detail-location">
                    <i class="bi bi-geo-alt"></i>
                    <?= htmlspecialchars($currentDestination['location']) ?>
                </p>

                <p class="detail-time">
                    <i class="bi bi-clock"></i>
                    Thời gian: <?= htmlspecialchars($currentDestination['time']) ?>
                </p>

                <div class="detail-price">
                    <?= number_format($currentDestination['price'], 0, ',', '.') ?> VNĐ
                </div>

                <div class="d-grid gap-2 mt-4">
                    <a href="#" class="btn btn-primary btn-lg">
                        <i class="bi bi-calendar-check"></i>
                        Đặt tour
                    </a>

                    <a href="destinations.php" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-arrow-left"></i>
                        Quay lại danh sách
                    </a>
                </div>

            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="detail-content-box">
                <h3>Mô tả địa điểm</h3>

                <p>
                    <?= htmlspecialchars($currentDestination['description']) ?>
                </p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="detail-content-box">
                <h3>Điểm nổi bật</h3>

                <ul class="highlight-list">
                    <?php foreach ($currentDestination['highlights'] as $highlight): ?>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <?= htmlspecialchars($highlight) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="footer text-center">
    <div class="container">
        <p>© 2026 Travel Việt Nam - Website du lịch</p>
    </div>
</footer>

<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>