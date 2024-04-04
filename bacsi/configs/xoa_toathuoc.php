<?php
include("./connect.php");

if (isset($_GET['matoa'])) {
    // Lấy mã toa từ tham số trên URL
    $matoa = $_GET['matoa'];

    // Bước 3: Thực hiện truy vấn SQL để xóa các chi tiết toa thuốc liên quan
    $sql_delete_chitiet = "DELETE FROM chitiettoathuoc WHERE MATOA = '$matoa'";
    if ($conn->query($sql_delete_chitiet) === TRUE) {
        // Tiếp tục xóa toa thuốc sau khi xóa các chi tiết
        $sql_delete_toathuoc = "DELETE FROM toa_thuoc WHERE MATOA = '$matoa'";
        if ($conn->query($sql_delete_toathuoc) === TRUE) {
            echo "Xóa toa thuốc và các chi tiết thành công";
        } else {
            echo "Lỗi khi xóa toa thuốc: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa các chi tiết toa thuốc: " . $conn->error;
    }
}

// Bước 4: Đóng kết nối
$conn->close();
?>
