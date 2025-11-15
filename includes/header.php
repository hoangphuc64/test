<?php
    // Gọi file config (lùi ra 1 cấp)
    include_once('../config.php');
    
    // Biến $module này sẽ được set ở mỗi trang (vd: 'bt_khoa', 'bt_phong')
    $module = $module ?? ''; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Trang quản trị'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body { display: flex; min-height: 100vh; flex-direction: column; }
        .wrapper { display: flex; flex: 1; }
        #sidebar {
            width: 250px;
            background: #343a40; /* Màu nền sidebar (màu tối) */
            color: #fff;
            min-height: 100vh; /* Kéo dài hết màn hình */
        }
        #sidebar .nav-link {
            color: #adb5bd; /* Màu chữ link */
            padding: 10px 15px;
            transition: all 0.3s;
        }
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: #fff;
            background: #495057;
            text-decoration: none;
        }
        #sidebar .nav-link .fa {
            margin-right: 10px; /* Khoảng cách icon và chữ */
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: #212529;
            text-align: center;
        }
        #content {
            width: 100%;
            padding: 30px;
            background-color: #f8f9fa; /* Màu nền nội dung */
        }
        .navbar-brand-custom {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo BASE_URL; ?>index.php" class="navbar-brand-custom">Trang Chủ</a>
    </div>

    <ul class="nav flex-column p-3">
    
        
        <li class="nav-item">
            <a class="nav-link <?php echo ($module == 'bt_khoa') ? 'active' : ''; ?>" 
               href="<?php echo BASE_URL; ?>bai_tap/bt_list.php?path=bt_khoa">
                <i class="fa fa-book"></i>
                Bài tập của Khoa
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?php echo ($module == 'bt_phong') ? 'active' : ''; ?>" 
               href="<?php echo BASE_URL; ?>bai_tap/bt_list.php?path=bt_phong">
                <i class="fa fa-user-graduate"></i>
                Bài tập của Phong
            </a>
        </li>
    </ul>
</nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
            <div class="container-fluid">
                <h4 class="mb-0"><?php echo $page_title ?? 'Dashboard'; ?></h4>
            </div>
        </nav>

        <main class="container-fluid">