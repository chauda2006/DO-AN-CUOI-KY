<!DOCTYPE html>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    


<link rel="stylesheet" href="assets/css/style.css?v=<?php echo filemtime('assets/css/style.css'); ?>">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
```

</head>

<body>

<!-- HEADER -->

<header>
    <nav class="navbar navbar-expand-lg fixed-top cafe-navbar">
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


        <!-- Button mobile -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link active" href="#">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="destinations.php">Điểm đến</a></li>
                <li class="nav-item"><a class="nav-link" href="lienhe.html">Liên hệ</a></li>
                    
                <a class="btn btn-success" href="detail.php">
                    <i class="bi bi-calendar-check"></i> chi tiết</a>
                <!-- Đặt nút này ở nơi bạn muốn hiển thị trên thanh menu -->
                 <button id="themeToggle" class="theme-btn">🌙 Chế độ tối</button>

            </ul>
        </div>

    </div>
</nav>

</header>

<!-- VIDEO NỀN -->

<video autoplay muted loop playsinline id="bg-video" style="width: 100%; height: auto;">
    <source src="assets/videos/nen01.mp4" type="video/mp4">
    Trình duyệt của bạn không hỗ trợ thẻ video.
</video>

<!-- HIỆU ỨNG -->

<div class="stars stars1"></div>

<div class="stars stars3"></div>

<!-- NỘI DUNG -->

<div class="content text-center text-white">
    <h1>Đẳng cấp hành trình - Nâng tầm trải nghiệm</h1>
    <p>Đi để thấy - Đi để yêu Việt Nam hơn</p>
</div>

<!-- GIỚI THIỆU -->

<section id="gioithieu" class="gioithieu container mt-5">
    <h2>Giới thiệu</h2>
    <p>
        Đề tài "Website giới thiệu và quản lý địa điểm du lịch Việt Nam" được xây dựng nhằm cung cấp cho người dùng thông tin về các địa điểm du lịch nổi tiếng trên khắp Việt Nam. Website cho phép người dùng xem danh sách, tìm kiếm, lọc theo vùng miền hoặc loại hình, đồng thời xem thông tin chi tiết của từng địa điểm. Bên cạnh đó, hệ thống còn có trang quản trị (Admin) với các chức năng đăng nhập, thêm, sửa, xóa và quản lý dữ liệu địa điểm du lịch (CRUD). Đề tài hướng đến việc xây dựng một website có giao diện thân thiện, dễ sử dụng, hỗ trợ hiển thị trên nhiều thiết bị và đáp ứng tốt nhu cầu tra cứu thông tin du lịch.</p>
</section>

<footer class="footer bg-dark text-white p-4 mt-5">
    <div class="container d-flex flex-wrap justify-content-between">

    <div>
        <h3>Thông tin liên hệ</h3>
        <p>🏫 Đại học Bình Dương</p>
        <p>📍 Cà Mau</p>
        <p>📞 097 193 68 19</p>
        <p>✉️ tuyensinh.cm@bdu.edu.vn</p>
    </div>

    <div>
        <h3>Liên kết</h3>
        <p><a href="https://sv.bdu.edu.vn" target="_blank" class="text-white">Cổng SV</a></p>
        <p><a href="https://camau.bdu.edu.vn" target="_blank" class="text-white">Website trường</a></p>
        <p><a href="https://github.com/chauda2006/test-github" target="_blank" class="text-white">Github</a></p>
    </div>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Liên kết JavaScript tự động xóa bộ nhớ đệm khi có thay đổi code -->
<script src="assets/js/script.js?v=<?php echo filemtime('assets/js/script.js'); ?>"></script>


</body>
</html>
