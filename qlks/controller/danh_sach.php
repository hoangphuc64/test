<?php
    $page_title = "Danh sách Phòng";
    $module = 'danh_sach'; // Để Top Navbar sáng đúng link

    // --- Giả lập dữ liệu Database ---
    $fake_data = [
        ['id' => 101, 'type' => 'Standard', 'status' => 'Available'],
        ['id' => 102, 'type' => 'Deluxe',   'status' => 'Available'],
        ['id' => 201, 'type' => 'Suite',    'status' => 'Cleaning'],
    ];
    // --- Kết thúc dữ liệu giả lập ---

    // Gọi header (lùi 1 cấp ra qlks, vào layout)
    include_once('../layout/header.php');
?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách Phòng</h5>
        <a href="them.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> Thêm phòng mới
        </a>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($fake_data as $room) {
                        $status_text = '';
                        $status_class = '';
                        if ($room['status'] == 'Available') {
                            $status_text = 'Còn trống';
                            $status_class = 'text-success';
                        } elseif ($room['status'] == 'Occupied') {
                            $status_text = 'Có khách';
                            $status_class = 'text-danger';
                        } else {
                            $status_text = 'Dọn dẹp';
                            $status_class = 'text-warning';
                        }
                    ?>
                    <tr>
                        <th><?php echo $room['id']; ?></th>
                        <td><?php echo $room['type']; ?></td>
                        <td><span class="fw-bold <?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                        <td>
                            <a href="sua.php?id=<?php echo $room['id']; ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Sửa
                            </a>
                            <a href="xoa.php?id=<?php echo $room['id']; ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Xoá
                            </a>
                        </td>
                    </tr>
                    <?php } // Kết thúc vòng lặp ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    // Gọi footer (lùi 1 cấp ra qlks, vào layout)
    include_once('../layout/footer.php');
?>