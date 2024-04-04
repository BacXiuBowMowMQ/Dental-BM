<?php
// Include your database connection file
include("./connect.php");

// Check if MACLV is provided
if (isset($_GET['macLV'])) { // Adjust parameter name if needed
    // Retrieve MACLV from the GET parameters
    $macLV = $_GET['macLV'];

    $sql = "SELECT nhanvien.HOTENNV, nhanvien.EMAILNV, nhanvien.SDTNV, nhanvien.GIOITINHNV, nhanvien.NAMSINHNV, nhanvien.DIACHINV, 
                   nhanvien.CHUNGCHIHANHNGHE, nhanvien.BANGCAPCHUYENMON, nhanvien.COSODAOTAO, nhanvien.SONAMKINHNGHIEM
            FROM nhanvien
            JOIN lichlamviec ON nhanvien.EMAILNV = lichlamviec.EMAILNV
            JOIN calamviec ON lichlamviec.MACLV = calamviec.MACLV
            WHERE calamviec.MACLV = ?";


    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $macLV);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch and output employee information
        $row = $result->fetch_assoc();
        echo "<p><strong>Họ và tên:</strong> " . $row["HOTENNV"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["EMAILNV"] . "</p>";
        echo "<p><strong>Số điện thoại:</strong> " . $row["SDTNV"] . "</p>";
        // Output other employee details as needed
    } else {
        echo "Không có thông tin nhân viên cho MACLV: " . $macLV;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // MACLV is not provided in the GET parameters
    echo "Vui lòng cung cấp MACLV để lấy thông tin nhân viên.";
}
?>
