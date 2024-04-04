<?php
// Include your database connection file (./configs/connect.php)
include("./connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the POST request
    $madichvu = $_POST["madichvu"];
    $tendichvu = $_POST["tendichvu"];
    $giadv = $_POST["giadv"];
    $tgapdv = $_POST["tgapdv"];

    // Validate and sanitize data as needed (use appropriate validation functions)

    // Update the dichvu table
    $updateDichvuSql = "UPDATE dichvu SET TENDICHVU = '$tendichvu' WHERE MADICHVU = '$madichvu'";

    // Update the dongiadichvu table
    $updateDongiaSql = "UPDATE dongiadichvu SET GIA_DV = '$giadv', TGAP_DV = '$tgapdv' WHERE MADICHVU = '$madichvu'";

    // Use a transaction to ensure atomicity (both queries should succeed or fail together)
    $conn->begin_transaction();

    try {
        // Execute the first update query
        $conn->query($updateDichvuSql);

        // Execute the second update query
        $conn->query($updateDongiaSql);

        // Commit the transaction if both queries are successful
        $conn->commit();

        echo "Dữ liệu đã được cập nhật thành công.";
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        $conn->rollback();
        echo "Error updating record: " . $e->getMessage() . "<br>";
        echo "SQL 1: " . $updateDichvuSql . "<br>"; // Output the SQL query for debugging
        echo "SQL 2: " . $updateDongiaSql . "<br>"; // Output the SQL query for debugging
    }

    // Close the database connection
    $conn->close();
}
?>
