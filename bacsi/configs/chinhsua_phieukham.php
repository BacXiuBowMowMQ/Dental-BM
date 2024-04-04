<?php

include("./connect.php");


// Lấy thông tin được gửi từ trang frontend
$emailbn = $_POST['emailbn'];
$hotenbn = $_POST['hotenbn'];
$sdtbn = $_POST['sdtbn'];
$gioitinhbn = $_POST['gioitinhbn'];
$namsinhbn = $_POST['namsinhbn'];
$diachibn = $_POST['diachibn'];
$mota = $_POST['mota'];



// Cập nhật bảng phieukhambenh
$sql_phieukhambenh = "UPDATE phieukhambenh SET hotenbn = '$hotenbn',  sdtbn = '$sdtbn',  gioitinhbn = '$gioitinhbn',
 namsinhbn = '$namsinhbn', diachibn = '$diachibn',  mota = '$mota' 
 WHERE emailbn = '$emailbn'";

if ($conn->query($sql_phieukhambenh) === TRUE) {
    echo "Chỉnh sửa thông tin thành công.";
} else {
    echo "Lỗi chỉnh sửa!!! " . $conn->error;
}




// Đóng kết nối
$conn->close();
?>