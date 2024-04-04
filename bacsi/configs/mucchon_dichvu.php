<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILNV
$sql = "SELECT madichvu,  TENDICHVU, GIADV FROM `dichvu` ";

$result = mysqli_query($conn, $sql);

echo '<div class="checkbox-group">';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="form-check">';
    echo '<input class="form-check-input" type="checkbox" name="madichvu[]" id="madichvu_'.$row["madichvu"].'" value="'.$row["madichvu"].'">';
    echo '<label class="form-check-label" for="madichvu_'.$row["madichvu"].'">     '.$row["TENDICHVU"].'  - Đơn giá: '.$row["GIADV"].'đ</label>';
    echo '</div>';
  }
}
echo '</div>';

// Đóng kết nối
mysqli_close($conn);
?>
