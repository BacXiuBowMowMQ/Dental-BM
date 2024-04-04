<?php
// Bao gồm tệp kết nối CSDL
include("./connect.php");


// Lấy thông tin được gửi từ trang frontend
$idphieu = $_POST['idphieu'];

$giodat = $_POST['giodat'];

// Cập nhật bảng dichvu
$sql_dichvu = "UPDATE phieudatlich SET GIODAT = '$giodat' WHERE IDPHIEU = '$idphieu'";

if ($conn->query($sql_dichvu) === TRUE) {
    echo "Record updated successfully in dichvu table";
} else {
    echo "Error updating record in dichvu table: " . $conn->error;
}




// Đóng kết nối
$conn->close();
?>