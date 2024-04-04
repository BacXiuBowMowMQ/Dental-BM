<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["maclv"])) {
    $maclv = $_POST["maclv"];

    // Trước tiên, xóa dữ liệu từ bảng con (lichlamviec)
    $sql_delete_lichlamviec = "DELETE FROM lichlamviec WHERE MACLV = '$maclv'";
    if ($conn->query($sql_delete_lichlamviec) === TRUE) {
        // Sau đó, xóa dữ liệu từ bảng mẹ (calamviec)
        $sql_delete_calamviec = "DELETE FROM calamviec WHERE MACLV = '$maclv'";
        if ($conn->query($sql_delete_calamviec) === TRUE) {
            echo "Dữ liệu đã được xóa thành công!";
        } else {
            echo "Lỗi khi xóa dữ liệu từ bảng mẹ: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa dữ liệu từ bảng con: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ hoặc không được cung cấp.";
}

$conn->close();
?>
