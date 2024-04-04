<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILNV
$sql = "SELECT MACLV,  THOIGIANBATDAU, THOIGIANKETTHUC FROM `calamviec` WHERE `xacnhan`='0' ";

$result = mysqli_query($conn, $sql);


echo '<select name="maclv"  class="form-select bg-light border-0 text-center" style="height: 40px;" id="maclv">';
echo '<option selected text-muted>Chọn </option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["MACLV"].'">'.$row["MACLV"].' - Bắt đầu:  '.$row["THOIGIANBATDAU"].' - Kết thúc: '.$row["THOIGIANKETTHUC"].'</option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
