<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["madichvu"])) {
    $madichvu = $_POST["madichvu"];

    // Thực hiện xóa dữ liệu từ bảng con trước
    $sql_delete_dongia = "DELETE FROM dongiadichvu WHERE MADICHVU = '$madichvu'";
    if ($conn->query($sql_delete_dongia) === TRUE) {
        // Sau đó xóa dữ liệu từ bảng cha
        $sql_delete_dichvu = "DELETE FROM dichvu WHERE MADICHVU = '$madichvu'";
        
        if ($conn->query($sql_delete_dichvu) === TRUE) {
            echo "Dữ liệu đã được xóa thành công!";
        } else {
            echo "Lỗi khi xóa dữ liệu: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa dữ liệu từ bảng con: " . $conn->error;
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

$conn->close();
?>
