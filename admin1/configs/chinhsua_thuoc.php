<?php
// Kiểm tra nếu có dữ liệu được gửi từ phía client
if(isset($_POST['mathuoc']) && isset($_POST['tenthuoc']) && isset($_POST['loaithuoc'])) {
    // Kết nối đến cơ sở dữ liệu
    include("./connect.php");

    // Lấy thông tin thuốc từ dữ liệu được gửi
    $mathuoc = $_POST['mathuoc'];
    $tenthuoc = $_POST['tenthuoc'];
    $loaithuoc = $_POST['loaithuoc'];

    // Cập nhật thông tin thuốc trong cơ sở dữ liệu
    $sql = "UPDATE thuoc SET TENTHUOC = '$tenthuoc', LOAITHUOC = '$loaithuoc' WHERE MATHUOC = '$mathuoc'";
    if ($conn->query($sql) === TRUE) {
        echo "Thông tin thuốc đã được cập nhật thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có dữ liệu được gửi!";
}
?>
