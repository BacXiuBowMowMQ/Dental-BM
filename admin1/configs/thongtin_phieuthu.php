<?php
// Include your database connection file
include("./connect.php");

// Check if stt_phieukham is provided
if (isset($_GET['stt_phieukham'])) {
    // Retrieve stt_phieukham from the GET parameters
    $stt_phieukham = $_GET['stt_phieukham'];

    // Prepare the SQL statement
    $sql = "SELECT pt.MAPT, pt.TONGGIA, pk.EMAILBN, dv.TENDICHVU, bs.EMAILNV, pt.NGAYLAPPT, pt.TRANGTHAI, pt.LYDO, bs.HOTENNV, bn.HOTENBN,
                GROUP_CONCAT(dv.TENDICHVU SEPARATOR '; ') AS TEN_DICH_VU
            FROM phieuthu pt
            JOIN phieukhambenh pk ON pt.STT_PHIEUKHAM = pk.STT_PHIEUKHAM
            JOIN pkbdv p ON pt.STT_PHIEUKHAM = p.STT_PHIEUKHAM
            JOIN dichvu dv ON p.MADICHVU = dv.MADICHVU
            JOIN nhanvien bs ON pk.EMAILNV = bs.EMAILNV
            JOIN benhnhan bn ON pk.EMAILBN = bn.EMAILBN
            WHERE pt.STT_PHIEUKHAM = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $stt_phieukham); // Assuming stt_phieukham is of type string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch and output phieuthu information
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>Mã Phiếu thu:</strong> " . $row["MAPT"] . "</p>";
            echo "<p><strong>Ngày lập phiếu:</strong> " . $row["NGAYLAPPT"] . "</p>";
            echo "<hr>";
          
            echo "<p><strong>Email bệnh nhân:</strong> " . $row["EMAILBN"] . "</p>";
            echo "<p><strong>Họ tên bệnh nhân:</strong> " . $row["HOTENBN"] . "</p>";
            echo "<p><strong>Email bác sĩ:</strong> " . $row["EMAILNV"] . "</p>";
            echo "<p><strong>Họ tên bác sĩ:</strong> " . $row["HOTENNV"] . "</p>";
            echo "<p><strong>Tên dịch vụ:</strong> " . $row["TEN_DICH_VU"] . "</p>";

            echo "<p><strong>Tổng giá:</strong> " . $row["TONGGIA"] . "</p>";            
            echo "<p><strong>Lý do:</strong> " . $row["LYDO"] . "</p>";
           
           // Hiển thị trạng thái dưới dạng "Đã thanh toán" và áp dụng CSS
    if ($row["TRANGTHAI"] == 1) {
        echo "<p><strong>Trạng thái:</strong> <span style='background-color: green; color: white; border: none; padding: 5px 10px; border-radius: 5px;'>Đã thanh toán</span></p>";
    } else {
        // Hiển thị trạng thái dưới dạng "Chưa thanh toán" và không áp dụng CSS
        echo "<p><strong>Trạng thái:</strong> <span style='background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px;'> Chưa thanh toán</p>";
    }
    
        }
    } else {
        echo "Không có thông tin phiếu thu cho STT phiếu khám: " . $stt_phieukham;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // stt_phieukham is not provided in the GET parameters
    echo "Vui lòng cung cấp STT phiếu khám để lấy thông tin phiếu thu.";
}
?>
