<?php

include "connect.php";

session_start();

// Cập nhật thông tin 
if(isset($_POST["sb"])){
    $sql=" UPDATE benhnhan SET HOTENBN ='".$_POST["ten"]."',NAMSINHBN ='".$_POST["ngaysinh"]."',
    GIOITINHBN ='".$_POST["gioitinh"]."',SDTBN ='".$_POST["sdt"]."',DIACHIBN ='".$_POST["diachi"]."' WHERE emailbn ='".$_SESSION["email"]."'
    ";


    $result = $conn->query($sql);
    if( $result){
        echo '<script language="javascript">
        alert("Đã lưu thông tin!");
        history.back();
         </script>';
    }
    else{
        echo '<script language="javascript">
        alert("Không Thể cập nhật!");
        history.back();
        </script>';
      
    }
}

// Đổi mật khẩu 
if(isset($_POST["sbpsw"])){
    $sql1 = "select * from benhnhan
    where emailbn = '".$_SESSION["email"]."' 
    and passwordbn = '".md5($_POST["psw2"])."'";
    $result = $conn->query($sql1);
    if($result->num_rows > 0){
        if($_POST["psw"]== $_POST["psw2"]){
            echo '<script language="javascript">
            alert("Mật khẩu cũ không được giống mật khẩu mới!");
            history.back();
            </script>';
        }
        elseif($_POST["psw"] != $_POST["psw1"]){
            echo '<script language="javascript">
            alert("Mật khẩu nhập lại không khớp!");
            history.back();
            </script>';
        }
        else{
            $sql=" UPDATE benhnhan set passwordbn = '".md5($_POST["psw"])."' 
            where emailbn = '".$_SESSION["email"]." '";
            //  print_r($sql);
            $result1 = $conn->query($sql);
            echo '<script language="javascript">
            alert("Đổi mật khẩu thành công!");
            history.back();
            </script>';
        }
    }
    else
        echo '<script language="javascript">
        alert("Mật khẩu cũ không đúng!");
        history.back();
            </script>';
}

// 


                
?>