<?php

include("./connect.php");


session_start();

if(isset($_POST["sb"])){
    $sql=" UPDATE nguoidung SET HOTEN='".$_POST["ten"]."',NAMSINH='".$_POST["ngaysinh"]."',
    GIOITINH='".$_POST["gioitinh"]."',SDT='".$_POST["sdt"]."',DIACHI='".$_POST["diachi"]."' WHERE email='".$_SESSION["email"]."'
    ";
    $result = $conn->query($sql);
    if( $result){
        echo '<script language="javascript">
        alert("đã lưu thông tin!");
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

// Cập nhập mật khẩu

if(isset($_POST["sbpsw"])){
    $sql1 = "select * from nguoidung
    where email = '".$_SESSION["email"]."' 
    and password = '".md5($_POST["psw2"])."'";
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
              $sql=" UPDATE nguoidung set password = '".md5($_POST["psw"])."' 
              where email = '".$_SESSION["email"]." '";
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
                
?>