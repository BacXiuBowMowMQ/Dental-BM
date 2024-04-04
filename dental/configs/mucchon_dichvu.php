<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILNV
$sql = "SELECT madichvu,  TENDICHVU FROM `dichvu` ";

$result = mysqli_query($conn, $sql);

echo '<select name="madichvu" class="form-select bg-light border-0" style="height: 55px;" id="madichvu">';
echo '<option selected text-muted>Chọn Dịch Vụ</option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["madichvu"].'">'.$row["madichvu"].' - '.$row["TENDICHVU"].'</option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
