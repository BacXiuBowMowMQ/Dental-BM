<?php

// Kiểm tra nếu có dữ liệu được gửi từ phía client
if(isset($_POST['mathuoc'])) {
    // Kết nối đến cơ sở dữ liệu
    include("./connect.php");

    // Lấy mã thuốc từ dữ liệu được gửi
    $mathuoc = $_POST['mathuoc'];

    // Xóa thuốc từ cơ sở dữ liệu
    $sql = "DELETE FROM thuoc WHERE MATHUOC = '$mathuoc'";
    if ($conn->query($sql) === TRUE) {
        echo "Thuốc đã được xóa thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có dữ liệu được gửi!";
}
?>
