<?php
// thongtin_toathuoc.php

session_start();

include("./connect.php");

$css = "
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f;
    }

    .thb {
        background-color: #4CAF50;
        color: white;
    }
</style>";

echo $css;



// Check if STT_PHIEUKHAM is provided in the request
if(isset($_GET['stt_phieukham'])) {
    $stt_phieukham = $_GET['stt_phieukham'];

    // Fetch additional information
    $sql_additional = "SELECT t.MATOA, t.CHUANDOAN, t.NGAYKEDON 
                       FROM toa_thuoc t 
                       WHERE t.STT_PHIEUKHAM = '$stt_phieukham'";
    $result_additional = $conn->query($sql_additional);

    if ($result_additional->num_rows > 0) {
        $row_additional = $result_additional->fetch_assoc();
        
        // Display additional information
       
        echo "<p>Mã toa: " . $row_additional["MATOA"] . "</p>";
        echo "<p>Chuẩn đoán: " . $row_additional["CHUANDOAN"] . "</p>";
        echo "<p>Ngày kê đơn: " . $row_additional["NGAYKEDON"] . "</p>";

        // Fetch prescription drug data for the given STT_PHIEUKHAM
        $sql = "SELECT tt.MATOA, tt.SOLUONG, tt.DONVITINH, tt.LIEUDUNG, t.TENTHUOC 
                FROM chitiettoathuoc tt 
                INNER JOIN thuoc t ON tt.MATHUOC = t.MATHUOC 
                WHERE tt.MATOA IN (SELECT MATOA FROM toa_thuoc WHERE STT_PHIEUKHAM = '$stt_phieukham')";
        $result_thuoc = $conn->query($sql);

        if ($result_thuoc->num_rows > 0) {
            echo "<p><strong><i class='fa-solid fa-capsules'></i> Đơn thuốc:</strong></p>";
            echo "<table border='1'>";
            echo "<tr><th class='thb'>Tên thuốc</th><th  class='thb'>Số lượng</th><th  class='thb'>Đơn vị</th><th  class='thb'>Liều dùng</th></tr>";
            while ($row_thuoc = $result_thuoc->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_thuoc["TENTHUOC"] . "</td>";
                echo "<td>" . $row_thuoc["SOLUONG"] . "</td>";
                echo "<td>" . $row_thuoc["DONVITINH"] . "</td>";
                echo "<td>" . $row_thuoc["LIEUDUNG"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Không có dữ liệu";
        }
    } else {
        echo "Không có dữ liệu";
    }
} else {
    echo "STT_PHIEUKHAM không được cung cấp";
}
?>