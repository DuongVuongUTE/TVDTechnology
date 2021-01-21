<?php session_start(); 
 
if (isset($_SESSION['tendn'])){
    unset($_SESSION['tendn']);
    unset($_SESSION['giohang']);//xóa giỏ hàng khi đăng xuất
}
header('location: ../../index.php')
  
?>