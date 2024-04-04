<?php

include("./connect.php");


// Lấy thông tin được gửi từ trang frontend
$emailnv = $_POST['emailnv'];
$hotennv = $_POST['hotennv'];
$sdtnv = $_POST['sdtnv'];
$gioitinhnv = $_POST['gioitinhnv'];
$namsinhnv = $_POST['namsinhnv'];
$diachinv = $_POST['diachinv'];



// Cập nhật bảng nhanvien
$sql_nhanvien = "UPDATE nhanvien SET hotennv = '$hotennv',  sdtnv = '$sdtnv',  gioitinhnv = '$gioitinhnv', namsinhnv = '$namsinhnv', diachinv = '$diachinv' WHERE emailnv = '$emailnv'";

if ($conn->query($sql_nhanvien) === TRUE) {
    echo "Record updated successfully in nhanvien table";
} else {
    echo "Error updating record in nhanvien table: " . $conn->error;
}




// Đóng kết nối
$conn->close();
?>