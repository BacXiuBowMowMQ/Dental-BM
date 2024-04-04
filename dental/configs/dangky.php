<?php

include("./connect.php");
session_start();


if(isset($_POST["sb_dk"])){
     // Default MAQUYEN value for new users
     $default_maquyen = 3;

    //echo $_POST["sdt"]."<br>";
    $sql1="SELECT * FROM benhnhan where emailbn='".$_POST["email"]."' ";
    $result1= $conn->query($sql1);
    if(mysqli_num_rows($result1)>0){
        echo '<script language="javascript">
    alert("Email đã được đăng ký!");
    history.back();
        </script>';
}
else{
 
    $date = date_create($_POST["ngaysinh"]);
    $sql2="INSERT INTO benhnhan(emailbn,sdtbn,passwordbn,hotenbn,cccdbn,gioitinhbn,namsinhbn,diachibn, MAQUYEN) 
    values('".$_POST["email"]."','".$_POST["sdt"]."','".md5($_POST["psw"])."',
    '".$_POST["ten"]."','".$_POST["cccd"]."','".$_POST["gioitinh"]."','".$date ->format('Y-m-d') ."','".$_POST["diachi"]."', '$default_maquyen') ";
    //echo $result2."<br>";
    $result2 = $conn->query($sql2);

    $sql="SELECT * FROM benhnhan where emailbn='".$_POST["email"]."' ";
    $result1 = $conn->query($sql);
    //echo $sql."<br>";
    if($result1->num_rows>0){
        
        $row = $result1->fetch_assoc();

        session_start();
        $_SESSION["name"] = $row["HOTENBN"];
        $_SESSION["ngaysinh"]=$row["NAMSINHBN"];
        $_SESSION["email"]=$row["emailbn"];
        $_SESSION["sdt"]=$row["SDTBN"];
        $_SESSION["diachi"]=$row["DIACHIBN"];
        $_SESSION["matkhau"]=$row["passwordbn"];

        echo '<script language="javascript">
        alert("Đã đăng ký tài khoản thành công !");
        history.back();
         </script>';
         
        header('Location: ../login.php');
    
    }

    else{
        echo"Lỗi không thể đăng ký";
        
    }
    }
}
?>