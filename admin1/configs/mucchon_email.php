<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILBN
$sql = "SELECT EMAILBN, HOTENBN FROM `benhnhan` ";

$result = mysqli_query($conn, $sql);

echo '<select name="emailbn" class="form-select bg-light border-0" style="height: 40px;" id="emailbn">';
echo '<option selected text-muted>Chọn </option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["EMAILBN"].'">'.$row["HOTENBN"].' - '.$row["EMAILBN"].' </option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
