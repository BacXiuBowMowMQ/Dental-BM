<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stt_phieukham"])) {
    $stt_phieukham = $_POST["stt_phieukham"];

    // Thực hiện xóa dữ liệu từ bảng phieukhambenh
    $sql_delete_phieukhambenh = "DELETE FROM phieukhambenh WHERE STT_PHIEUKHAM = '$stt_phieukham'";
  
    if ($conn->query($sql_delete_phieukhambenh) === TRUE) {
        // Sau khi xóa từ bảng phieukhambenh, xóa dữ liệu từ bảng pkbdv
        $sql_delete_pkbdv = "DELETE FROM pkbdv WHERE STT_PHIEUKHAM = '$stt_phieukham'";
        if ($conn->query($sql_delete_pkbdv) === TRUE) {
            echo '<script language="javascript">alert("Dữ liệu đã được xóa thành công!");</script>';
        } else {
            echo "Lỗi khi xóa dữ liệu từ bảng pkbdv: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa dữ liệu từ bảng phieukhambenh: " . $conn->error;
    }
}

$conn->close();
?>
