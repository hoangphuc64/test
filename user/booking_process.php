<?php
// FILE: user/booking_process.php

include_once('auth_customer.php'); 
include_once(__DIR__ . '/../config.php'); 
include_once(__DIR__ . '/../controller/BookingController.php'); 

$bookingController = new BookingController($conn);
$action = isset($_POST['action']) ? $_POST['action'] : '';

$redirect_url = "my_bookings.php"; 
$swal_type = "info";
$swal_message = "Hành động không xác định.";

try {
    // ====================================================
    // CASE 1: TẠO ĐƠN ĐẶT PHÒNG
    // ====================================================
    if ($action == 'create_booking') {
        $room_id = $_POST['room_id'];
        $check_in = $_POST['check_in_date'];
        $check_out = $_POST['check_out_date'];
        // $total_price = $_POST['total_price']; // <-- BỎ DÒNG NÀY HOẶC KHÔNG DÙNG NÓ
        
        // --- [SỬA LỖI TẠI ĐÂY] ---
        // Chỉ truyền 3 tham số đúng như Controller yêu cầu
        $result = $bookingController->createBooking($room_id, $check_in, $check_out);

        if (is_array($result)) {
            $swal_type = $result['status'];    
            $swal_message = $result['message'];
            
            if ($result['status'] == 'error') {
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $redirect_url = $_SERVER['HTTP_REFERER'];
                } else {
                    $redirect_url = "../index.php"; 
                }
            } else {
                // Thành công hoặc Warning -> Về trang danh sách đơn
                $redirect_url = "my_bookings.php"; 
            }
        } else {
            $swal_type = "success";
            $swal_message = $result;
        }

    // ... (Giữ nguyên phần còn lại) ...
    } elseif ($action == 'process_payment_simulate') {
        // ... (Giữ nguyên) ...
        $booking_id = $_POST['booking_id'];
        $amount = $_POST['amount'];
        $result_message = $bookingController->updatePaymentStatusSimulate($booking_id, $amount);
        $swal_type = "success";
        $swal_message = $result_message;
        $redirect_url = "my_bookings.php";

    } elseif ($action == 'delete_booking') {
        // ... (Giữ nguyên) ...
        $booking_id = $_POST['booking_id'];
        $result_message = $bookingController->deleteBooking($booking_id);
        $swal_type = "success";
        $swal_message = $result_message;
        $redirect_url = "my_bookings.php";

    } else {
        $swal_type = "error";
        $swal_message = "Lỗi: Hành động không được hỗ trợ.";
    }

} catch (Exception $e) {
    $swal_type = "error";
    $swal_message = "Lỗi hệ thống: " . $e->getMessage();
    
    if ($action == 'create_booking') {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $redirect_url = $_SERVER['HTTP_REFERER'];
        } else {
            $redirect_url = "../index.php"; 
        }
    }
}

$_SESSION['swal_type'] = $swal_type;
$_SESSION['swal_message'] = $swal_message;
$_SESSION['message'] = $swal_message; // Thêm dòng này để rooms.php hiện được lỗi cũ

header("Location: " . $redirect_url);
exit();
?>