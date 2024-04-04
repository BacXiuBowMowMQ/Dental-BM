<?php
    include("./connect.php");
    session_start();

    if(isset($_POST["sb"])){
            // Bệnh nhân
            $sql1="SELECT * FROM benhnhan where emailbn ='".$_POST["name"]."' AND passwordbn='".md5($_POST["psw"])."'AND maquyen='3'";
            $result2 = $conn->query($sql1);
            if($result2->num_rows>0){
                $row = $result2->fetch_assoc();
                session_start();
                $_SESSION["name"] = $row["HOTENBN"];
                $_SESSION["ngaysinh"]=$row["NAMSINHBN"];
                $_SESSION["email"]=$row["EMAILBN"];
                $_SESSION["sdt"]=$row["SDTBN"];
                $_SESSION["diachi"]=$row["DIACHIBN"];
                $_SESSION["matkhau"]=$row["passwordbn"];
                $_SESSION["CCCD"]=$row["CCCDBN"];
                $_SESSION["QUYENNV"]=$row["MAQUYEN"];
                header('Location: ../index.php');             
            }
            else{ 
                echo '<script language="javascript">
            alert("Nhập sai email hoặc mật khẩu.");
            history.back();
                </script>';
                
            }
        
            $_SESSION['ngaybd']=date('Y-m-d', strtotime('-1 month'));
            $_SESSION['ngaykt']= date('Y-m-d');
    }
                
?>