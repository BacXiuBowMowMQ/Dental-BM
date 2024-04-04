<?php
include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy STT_PHIEUKHAM và HOTENBN
$sql = "SELECT p.STT_PHIEUKHAM, b.HOTENBN, p.NGAYKHAM, p.GIOKHAM 
        FROM phieukhambenh p 
        INNER JOIN benhnhan b ON p.EMAILBN = b.EMAILBN";

$result = mysqli_query($conn, $sql);

echo '<select name="stt_phieukham" class="form-select bg-light border-0 text-center" style="height: 40px;" id="stt_phieukham">';
echo '<option selected disabled>Chọn </option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["STT_PHIEUKHAM"].'">'.$row["STT_PHIEUKHAM"].' : '.$row["HOTENBN"].' - Ngày khám: '.$row["NGAYKHAM"].' - '.$row["GIOKHAM"].' </option>';
  }
}
echo '</select>';

?>
