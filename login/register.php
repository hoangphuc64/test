
<?php
    // Gọi config (lùi 1 cấp)
   include_once(__DIR__ . '/../config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Hệ thống Quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .register-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 30px 0; }
        .register-card { width: 100%; max-width: 500px; border: none; border-radius: 0.75rem; }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="card shadow-lg register-card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fa fa-user-plus fa-3x text-success"></i>
                    <h2 class="mt-3 fw-bold">Tạo tài khoản</h2>
                    <p class="text-muted">Bắt đầu với dự án của chúng tôi.</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Tên đăng nhập:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Mật khẩu:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label fw-semibold">Nhập lại Mật khẩu:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg fw-bold">
                            <i class="fa fa-check"></i> Đăng ký
                        </button>
                    </div>
                </form>
                <hr class="my-4">
                <div class="text-center">
                    <p class="text-muted mb-0">Đã có tài khoản?</p>
                    <a href="index.php" class="fw-bold text-decoration-none">
                        Đăng nhập tại đây
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>