<?php
// Bao gồm tệp kết nối CSDL
include("./connect.php");

// Kiểm tra nếu tồn tại mã dịch vụ được gửi từ AJAX
if(isset($_POST['madichvu'])) {
    // Lấy mã dịch vụ từ yêu cầu AJAX
    $madichvu = $_POST['madichvu'];

    // Truy vấn để lấy ngày dịch vụ từ bảng chitietdichvu dựa trên mã dịch vụ
    $query = "SELECT NGAYDV FROM chitietdichvu WHERE MADICHVU = '$madichvu'";
    $result = $conn->query($query);

    if($result) {
        // Nếu truy vấn thành công, trả về ngày dịch vụ
        $row = $result->fetch_assoc();
        $ngaydv = $row['NGAYDV'];

        // Định dạng lại ngày tháng
        $ngaydv_formatted = date('d/m/Y', strtotime($ngaydv));
        
        // Trả về kết quả
        echo $ngaydv_formatted;
       
    } else {
        // Nếu có lỗi xảy ra trong quá trình truy vấn, thông báo lỗi
        echo "Lỗi: " . $conn->error;
    }
} else {
    // Nếu không có mã dịch vụ được gửi, thông báo lỗi
    echo "Không có mã dịch vụ được gửi.";
}

// Đóng kết nối CSDL
$conn->close();
?>