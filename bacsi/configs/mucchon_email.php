<?php

include("connect.php");

// Truy vấn cơ sở dữ liệu để lấy EMAILBN
$sql = "SELECT DISTINCT bn.EMAILBN, bn.HOTENBN, bn.SDTBN, bn.GIOITINHBN, bn.NAMSINHBN, bn.CCCDBN, bn.DIACHIBN, bn.NHOMMAU
        FROM benhnhan bn
        INNER JOIN phieudatlich pd ON bn.EMAILBN = pd.EMAILBN
        WHERE pd.EMAILNV = '{$_SESSION['emailnv']}'";

$result = mysqli_query($conn, $sql);

echo '<select name="emailbn" class="form-select bg-light border-0" style="height: 40px;" id="emailbn">';
echo '<option selected text-muted>Chọn Bệnh nhân</option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["EMAILBN"].'">'.$row["HOTENBN"].' - '.$row["EMAILBN"].' </option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);

?>
