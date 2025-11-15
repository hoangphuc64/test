<?php
    $page_title = "Sửa thông tin phòng";
    $module = 'danh_sach'; // Vẫn làm sáng link "Danh sách"

    // --- Giả lập lấy ID và dữ liệu cũ ---
    $room_id = $_GET['id'] ?? '???';
    $fake_room_data = [
        'id' => $room_id,
        'type' => 'Deluxe', // Giả vờ loại phòng là Deluxe
        'status' => 'Occupied'  // Giả vờ trạng thái là Có khách
    ];
    // --- Kết thúc dữ liệu giả lập ---

    // Gọi header
    include_once('../layout/header.php');
?>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Sửa phòng: <?php echo htmlspecialchars($fake_room_data['id']); ?></h5>
                <a href="danh_sach.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Quay lại
                </a>
            </div>
            
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Số phòng:</label>
                        <input type="number" class="form-control" id="room_id" name="room_id" 
                               value="<?php echo htmlspecialchars($fake_room_data['id']); ?>" readonly>
                        <div class="form-text">Số phòng không thể thay đổi.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Loại phòng:</label>
                        <select class="form-select" id="room_type" name="room_type" required>
                            <option value="Standard" <?php echo ($fake_room_data['type'] == 'Standard') ? 'selected' : ''; ?>>
                                Standard (Thường)
                            </option>
                            <option value="Deluxe" <?php echo ($fake_room_data['type'] == 'Deluxe') ? 'selected' : ''; ?>>
                                Deluxe (Sang trọng)
                            </option>
                            <option value="Suite" <?php echo ($fake_room_data['type'] == 'Suite') ? 'selected' : ''; ?>>
                                Suite (Cao cấp)
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_available" value="Available"
                                   <?php echo ($fake_room_data['status'] == 'Available') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="status_available">Còn trống</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_occupied" value="Occupied"
                                   <?php echo ($fake_room_data['status'] == 'Occupied') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="status_occupied">Có khách</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_cleaning" value="Cleaning"
                                   <?php echo ($fake_room_data['status'] == 'Cleaning') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="status_cleaning">Đang dọn dẹp</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Cập nhật
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    // Gọi footer
    include_once('../layout/footer.php');
?>