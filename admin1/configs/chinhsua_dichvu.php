<?php
// Bao gồm tệp kết nối CSDL
include("./connect.php");


// Lấy thông tin được gửi từ trang frontend
$madichvu = $_POST['madichvu'];
$tendichvu = $_POST['tendichvu'];
$giadv = $_POST['giadv'];
$motadv = $_POST['motadv'];

// Cập nhật bảng dichvu
$sql_dichvu = "UPDATE dichvu SET TENDICHVU = '$tendichvu',  GIADV = '$giadv',  motadv = '$motadv' WHERE MADICHVU = '$madichvu'";

if ($conn->query($sql_dichvu) === TRUE) {
    echo "Record updated successfully in dichvu table";
} else {
    echo "Error updating record in dichvu table: " . $conn->error;
}




// Đóng kết nối
$conn->close();
?>