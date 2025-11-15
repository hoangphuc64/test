<?php
    $page_title = "Thêm phòng mới";
    $module = 'them'; // Để Top Navbar sáng đúng link

    // Gọi header
    include_once('../layout/header.php');
?>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Thêm phòng mới</h5>
                <a href="danh_sach.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Quay lại
                </a>
            </div>
            
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Số phòng:</label>
                        <input type="number" class="form-control" id="room_id" name="room_id" placeholder="Nhập số phòng, ví dụ: 101" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Loại phòng:</label>
                        <select class="form-select" id="room_type" name="room_type" required>
                            <option value="" selected disabled>-- Chọn loại phòng --</option>
                            <option value="Standard">Standard (Thường)</option>
                            <option value="Deluxe">Deluxe (Sang trọng)</option>
                            <option value="Suite">Suite (Cao cấp)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái ban đầu:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_available" value="Available" checked>
                            <label class="form-check-label" for="status_available">Còn trống (Available)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_cleaning" value="Cleaning">
                            <label class="form-check-label" for="status_cleaning">Đang dọn dẹp (Cleaning)</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Lưu lại
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