<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILNV
$sql = "SELECT emailnv,  hotennv FROM `nhanvien` WHERE `maquyen`='2'";

$result = mysqli_query($conn, $sql);

echo '<select name="emailnv" class="form-select bg-light border-0" style="height: 40px;" id="emailnv">';
echo '<option selected text-muted>Chọn </option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["emailnv"].'">'.$row["hotennv"].' - '.$row["emailnv"].'</option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
