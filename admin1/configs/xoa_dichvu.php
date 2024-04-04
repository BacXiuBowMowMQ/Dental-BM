<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["madichvu"])) {
    $madichvu = $_POST["madichvu"];

    // Thực hiện xóa dữ liệu 
    $sql_delete_dichvu = "DELETE FROM dichvu WHERE MADICHVU = '$madichvu'";
  
    if ($conn->query($sql_delete_dichvu) === TRUE) {
        echo '<script language="javascript">alert("Dữ liệu đã được xóa thành công!");</script>';
        
    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
    }
       
}

$conn->close();
?>
