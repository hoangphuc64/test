<?php
    // Đặt biến $page_title và $module để header_qlks.php có thể sử dụng
    $page_title = "Dashboard Quản lý Khách sạn";
    $module = 'dashboard'; // Tên module này để navbar sáng đúng link

    // --- Giả lập dữ liệu Thống kê CHI TIẾT ---
    
    // 1. Thống kê Card
    $available_rooms = 10;
    $occupied_rooms = 12;
    $cleaning_rooms = 3;
    $total_rooms = $available_rooms + $occupied_rooms + $cleaning_rooms;

    // 2. Dữ liệu Bảng Đặt phòng (CHI TIẾT HƠN)
    $fake_bookings = [
        ['guest' => 'Nguyễn Văn A', 'room' => 102, 'check_in' => '2025-11-15', 'check_out' => '2025-11-17', 'status' => 'Đã xác nhận'],
        ['guest' => 'Trần Thị B', 'room' => 202, 'check_in' => '2025-11-14', 'check_out' => '2025-11-16', 'status' => 'Đã check-in'],
        ['guest' => 'Lê Văn C', 'room' => 302, 'check_in' => '2025-11-15', 'check_out' => '2025-11-18', 'status' => 'Đã xác nhận'],
        ['guest' => 'Phạm Thị D', 'room' => 103, 'check_in' => '2025-11-16', 'check_out' => '2025-11-17', 'status' => 'Đã thanh toán'],
    ];
    
    // 3. Dữ liệu Sơ đồ Phòng (MỚI)
    $fake_room_list = [
        ['id' => 101, 'status' => 'Available'], ['id' => 102, 'status' => 'Occupied'],
        ['id' => 103, 'status' => 'Occupied'], ['id' => 104, 'status' => 'Available'],
        ['id' => 105, 'status' => 'Available'], ['id' => 201, 'status' => 'Cleaning'],
        ['id' => 202, 'status' => 'Occupied'], ['id' => 203, 'status' => 'Available'],
        ['id' => 204, 'status' => 'Cleaning'], ['id' => 205, 'status' => 'Available'],
        ['id' => 301, 'status' => 'Available'], ['id' => 302, 'status' => 'Occupied'],
        ['id' => 303, 'status' => 'Cleaning'], ['id' => 304, 'status' => 'Available'],
        ['id' => 305, 'status' => 'Occupied'],
    ];
    // --- Kết thúc dữ liệu giả lập ---

    // Gọi header (nằm trong thư mục layout/)
    // DÒNG NÀY SẼ THAY THẾ CHO DÒNG LỖI CỦA ÔNG
    include_once('layout/header.php');
?>

<style>
    .room-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 15px;
    }
    .room-box {
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        text-align: center;
        font-weight: bold;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }
    .room-box:hover {
        transform: scale(1.05);
    }
    .room-box .room-id {
        font-size: 1.5rem;
        display: block;
    }
    .room-box .room-status {
        font-size: 0.8rem;
        display: block;
        opacity: 0.9;
    }
    /* Màu sắc */
    .room-available { background-color: #28a745; } /* Màu xanh */
    .room-occupied { background-color: #dc3545; } /* Màu đỏ */
    .room-cleaning { background-color: #ffc107; color: #212529 !important; } /* Màu vàng */
</style>


<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="fs-1 text-primary me-3"><i class="fa fa-hotel"></i></div>
                <div>
                    <h5 class="card-title text-muted mb-1">Tổng phòng</h5>
                    <h2 class="card-text fw-bold"><?php echo $total_rooms; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="fs-1 text-success me-3"><i class="fa fa-check-circle"></i></div>
                <div>
                    <h5 class="card-title text-muted mb-1">Còn trống</h5>
                    <h2 class="card-text fw-bold"><?php echo $available_rooms; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="fs-1 text-danger me-3"><i class="fa fa-user-times"></i></div>
                <div>
                    <h5 class="card-title text-muted mb-1">Có khách</h5>
                    <h2 class="card-text fw-bold"><?php echo $occupied_rooms; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="fs-1 text-warning me-3"><i class="fa fa-broom"></i></div>
                <div>
                    <h5 class="card-title text-muted mb-1">Đang dọn</h5>
                    <h2 class="card-text fw-bold"><?php echo $cleaning_rooms; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div> <div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fa fa-calendar-alt"></i> Các lượt đặt phòng (Bookings)</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Khách hàng</th>
                                <th>Phòng</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($fake_bookings as $booking) {
                                // Xử lý màu cho trạng thái
                                $badge_class = 'bg-secondary';
                                if ($booking['status'] == 'Đã check-in') $badge_class = 'bg-success';
                                if ($booking['status'] == 'Đã xác nhận') $badge_class = 'bg-primary';
                                if ($booking['status'] == 'Đã thanh toán') $badge_class = 'bg-info text-dark';
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($booking['guest']); ?></td>
                                <td><?php echo htmlspecialchars($booking['room']); ?></td>
                                <td><?php echo htmlspecialchars($booking['check_in']); ?></td>
                                <td><?php echo htmlspecialchars($booking['check_out']); ?></td>
                                <td>
                                    <span class="badge <?php echo $badge_class; ?>">
                                        <?php echo htmlspecialchars($booking['status']); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php } // Hết lặp ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fa fa-bolt"></i> Hành động nhanh</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa fa-calendar-plus text-primary me-2"></i> Thêm Đặt phòng (UI)
                    </a>
                    <a href="<?php echo BASE_URL; ?>qlks/controller/them.php" class="list-group-item list-group-item-action">
                        <i class="fa fa-plus-square text-success me-2"></i> Thêm Phòng mới
                    </a>
                    <a href="<?php echo BASE_URL; ?>qlks/controller/danh_sach.php" class="list-group-item list-group-item-action">
                        <i class="fa fa-list text-info me-2"></i> Xem Toàn bộ Phòng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> <div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fa fa-th-large"></i> Sơ đồ Trạng thái Phòng</h5>
            </div>
            <div class="card-body">
                <div class="room-grid">
                    <?php
                    foreach ($fake_room_list as $room) {
                        $box_class = '';
                        $status_text = '';
                        
                        if ($room['status'] == 'Available') {
                            $box_class = 'room-available';
                            $status_text = 'Trống';
                        } elseif ($room['status'] == 'Occupied') {
                            $box_class = 'room-occupied';
                            $status_text = 'Có khách';
                        } elseif ($room['status'] == 'Cleaning') {
                            $box_class = 'room-cleaning';
                            $status_text = 'Dọn dẹp';
                        }
                    ?>
                    <div class="room-box <?php echo $box_class; ?>">
                        <span class="room-id"><?php echo $room['id']; ?></span>
                        <span class="room-status"><?php echo $status_text; ?></span>
                    </div>
                    <?php } // Hết lặp ?>
                </div>
            </div>
        </div>
    </div>
</div> <?php
    // Gọi footer (nằm trong thư mục layout/)
    include_once('layout/footer.php');
?>