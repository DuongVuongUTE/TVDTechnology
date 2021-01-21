<?php 
    require("../connect/connect.php");
    // xóa tài khoản người dùng
    if(isset($_GET["action"]))  
    {  
     if($_GET["action"] == "delete")  
     {
         $id_item = $_GET["id"];
         $sql = "DELETE from tbl_member where ID=".$id_item."";
         $ketqua = mysqli_query($con,$sql);
         if($ketqua > 0){  
                 echo '<script>window.location="index.php?nc=taikhoan"</script>';
         }
     }  
    }
?>
