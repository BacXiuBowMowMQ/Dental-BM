<?php
include("./connect.php");

// Lấy thông tin được gửi từ trang frontend
$maclv = $_POST['maclv'];
$ngaybatdau = $_POST['ngaybatdau'];
$giobatdau = $_POST['giobatdau'];
$gioketthuc = $_POST['gioketthuc'];

// Tạo đối tượng DateTime từ ngày và giờ bắt đầu
$thoigianbatdau = new DateTime($ngaybatdau . ' ' . $giobatdau);

// Tạo đối tượng DateTime từ ngày và giờ kết thúc
$thoigianketthuc = new DateTime($ngaybatdau . ' ' . $gioketthuc);

// Format lại để lưu vào MySQL datetime format
$thoigianbatdau_formatted = $thoigianbatdau->format('Y-m-d H:i:s');
$thoigianketthuc_formatted = $thoigianketthuc->format('Y-m-d H:i:s');

// Cập nhật bảng calamviec
$sql_calamviec = "UPDATE calamviec SET thoigianbatdau = '$thoigianbatdau_formatted', thoigianketthuc = '$thoigianketthuc_formatted' WHERE maclv = '$maclv'";

if ($conn->query($sql_calamviec) === TRUE) {
    echo "Chỉnh sửa thông tin thành công!";
} else {
    echo "Lỗi chỉnh sửa: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
