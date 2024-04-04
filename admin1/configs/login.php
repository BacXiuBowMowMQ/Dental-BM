<?php
    include("./connect.php");

    if(isset($_POST["sb"])){
        $email = $_POST["name"];
        $password = md5($_POST["psw"]);

        // Kiểm tra trong bảng NHANVIEN
        $sql = "SELECT * FROM NHANVIEN WHERE EMAILNV='$email' AND PASSWORDNV='$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION["name"] = $row["HOTENNV"];
            $_SESSION["ngaysinh"] = $row["NAMSINHNV"];
            $_SESSION["email"] = $row["EMAILNV"];
            $_SESSION["sdt"] = $row["SDTNV"];
            $_SESSION["diachi"] = $row["DIACHINV"];
            $_SESSION["matkhau"] = $row["PASSWORDNV"];
            $_SESSION["maquyen"] = $row["MAQUYEN"];
            $_SESSION["ngayvaolamviec"] = $row["NGAYVAOLAMVIEC"];

            // Redirect dựa trên MAQUYEN
            if($row["MAQUYEN"] == 1) {
                header('Location: ../index.php'); // Đây là đường dẫn của trang admin
            } 
            exit();
        } else {
            echo '<script language="javascript"> alert("Nhập sai email hoặc mật khẩu."); history.back(); </script>';
        }
    }
?>
