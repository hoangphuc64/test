<?php

/*
 * CẤU HÌNH ĐƯỜNG DẪN GỐC (BASE_URL)
 * * Đây là phần quan trọng nhất để sửa lỗi.
 * * - Nếu ông đang chạy trên WAMP (localhost/QLKS/):
 * Hãy để là define('BASE_URL', '/QLKS/');
 * * - Khi nào ông upload lên InfinityFree:
 * Hãy sửa lại thành define('BASE_URL', '/');
 */

define('BASE_URL', '/');

// (Sau này ông có thể thêm cấu hình Database ở đây)
// define('DB_HOST', 'sql123.infinityfree.com');
// define('DB_USER', 'if_...');
// define('DB_PASS', '...');
// define('DB_NAME', 'if_...');

?>