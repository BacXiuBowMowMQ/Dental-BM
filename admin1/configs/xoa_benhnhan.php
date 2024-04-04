<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emailbn"])) {
    $emailbn = $_POST["emailbn"];

    // Kiểm tra xem có cuộc hẹn nào tương ứng với emailbn không
    $sql_check_appointment = "SELECT * FROM phieudatlich WHERE emailbn = '$emailbn'";
    $result = $conn->query($sql_check_appointment);

    if ($result->num_rows > 0) {
        // Nếu có cuộc hẹn tồn tại, hiển thị thông báo không thể xóa
        echo "Không thể xóa bệnh nhân vì bệnh nhân này đã có cuộc hẹn!";
    } else {
        // Nếu không có cuộc hẹn, thực hiện xóa dữ liệu
        $sql_delete_benhnhan = "DELETE FROM benhnhan WHERE emailbn = '$emailbn'";
  
        if ($conn->query($sql_delete_benhnhan) === TRUE) {
            echo "Dữ liệu đã được xóa thành công!";
        } else {
            echo "Lỗi khi xóa dữ liệu: " . $conn->error;
        }
    }
}

$conn->close();
?>
