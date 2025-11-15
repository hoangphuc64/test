<?php
    $page_title = "Xác nhận Xoá phòng";
    $module = 'danh_sach'; // Vẫn làm sáng link "Danh sách"

    // --- Giả lập lấy ID ---
    $room_id = $_GET['id'] ?? '???';
    // --- Kết thúc dữ liệu giả lập ---

    // Gọi header
    include_once('../layout/header.php');
?>

<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card shadow-sm border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0"><i class="fa fa-exclamation-triangle"></i> Cảnh báo Xoá</h5>
            </div>
            
            <div class="card-body">
                <p class="fs-5">
                    Bạn có chắc chắn muốn xoá phòng số 
                    <strong class="text-danger"><?php echo htmlspecialchars($room_id); ?></strong>
                    không?
                </p>
                <p class="text-muted">Hành động này không thể hoàn tác.</p>
                
                <form>
                    <a href="danh_sach.php" class="btn btn-secondary">
                        <i class="fa fa-times"></i> Huỷ
                    </a>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Xác nhận Xoá
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