<?php
    // Gọi config (lùi 1 cấp)
    include_once(__DIR__ . '/../config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Hệ thống Quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 100%; max-width: 450px; border: none; border-radius: 0.75rem; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card shadow-lg login-card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <a href="<?php echo BASE_URL; ?>index.php" class="text-decoration-none text-primary">
                        <i class="fa fa-hotel fa-3x"></i>
                    </a>
                        <h2 class="mt-3 fw-bold">Đăng nhập</h2>
                        <p class="text-muted">Chào mừng trở lại!</p>
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
                        <label for="password" class="form-label fw-semibold">Mật khẩu:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ghi nhớ tôi</label>
                        </div>
                        <a href="#" class="small text-decoration-none">Quên mật khẩu?</a>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold">
                            <i class="fa fa-sign-in-alt"></i> Đăng nhập
                        </button>
                    </div>
                </form>
                <hr class="my-4">
                <div class="text-center">
                    <p class="text-muted mb-0">Chưa có tài khoản?</p>
                    <a href="register.php" class="fw-bold text-decoration-none">
                        Đăng ký ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>