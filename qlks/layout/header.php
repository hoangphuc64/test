<?php
    // Gọi file config (phải lùi 2 cấp: layout -> qlks -> QLKS)
include_once(__DIR__ . '/../../config.php');    
    // Biến $module này sẽ được set ở mỗi trang (vd: 'dashboard', 'danh_sach')
    // để làm "sáng" link trên Navbar
    $module = $module ?? ''; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Quản lý Khách sạn'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền xám nhạt */
        }
        .navbar-brand {
            font-weight: 600;
        }
        .main-content {
            padding-top: 30px; /* Khoảng cách với Navbar */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>index.php">
            <i class="fa fa-home"></i>
            Trang chủ (Edu)
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link <?php echo ($module == 'dashboard') ? 'active' : ''; ?>" 
                       href="<?php echo BASE_URL; ?>qlks/index.php">
                       <i class="fa fa-tachometer-alt"></i> Thống kê (Dashboard)
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo ($module == 'danh_sach') ? 'active' : ''; ?>" 
                       href="<?php echo BASE_URL; ?>qlks/controller/danh_sach.php">
                       <i class="fa fa-list"></i> Danh sách phòng
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($module == 'them') ? 'active' : ''; ?>" 
                       href="<?php echo BASE_URL; ?>qlks/controller/them.php">
                       <i class="fa fa-plus"></i> Thêm phòng mới
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid main-content">

    <h2 class="mb-4"><?php echo $page_title ?? 'Trang quản trị'; ?></h2>