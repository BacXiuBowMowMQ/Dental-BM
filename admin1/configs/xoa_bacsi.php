<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emailnv"])) {
    $emailnv = $_POST["emailnv"];

    // Thực hiện xóa dữ liệu 
    $sql_delete_nhanvien = "DELETE FROM nhanvien WHERE emailnv = '$emailnv'";
  
    if ($conn->query($sql_delete_nhanvien) === TRUE) {
        echo '"Dữ liệu đã được xóa thành công!"';
        
    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
    }
       
}

$conn->close();
?>
