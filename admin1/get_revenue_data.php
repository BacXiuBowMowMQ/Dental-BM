<?php
// Kết nối đến cơ sở dữ liệu
include "./configs/connect.php";

// Lấy ngày từ yêu cầu GET
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

// Truy vấn SQL để lấy thông tin danh thu theo khoảng thời gian
$sql = "SELECT DATE(NGAYLAPPT) AS date, 
               SUM(CASE WHEN TRANGTHAI = 1 THEN TONGGIA ELSE 0 END) AS paid_amount, 
               SUM(CASE WHEN TRANGTHAI = 0 THEN TONGGIA ELSE 0 END) AS unpaid_amount 
        FROM phieuthu 
        WHERE DATE(NGAYLAPPT) BETWEEN '$startDate' AND '$endDate'
        GROUP BY DATE(NGAYLAPPT)";
$result = $conn->query($sql);

// Khởi tạo mảng dữ liệu
$revenue_data = array();

// Xử lý kết quả
while ($row = $result->fetch_assoc()) {
    $date = $row['date'];
    $revenue_data[$date] = array(
        'paid' => $row['paid_amount'],
        'unpaid' => $row['unpaid_amount']
    );
}

// Đóng kết nối
$conn->close();

// Trả về dữ liệu dưới dạng JSON
echo json_encode($revenue_data);
?>
