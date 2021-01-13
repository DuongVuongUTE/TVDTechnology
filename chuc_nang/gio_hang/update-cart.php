<?php

$id = $_POST['id'];
$sl = $soluong[$id];

$_SESSION['giohang'][$id] = sl;
//echo "<script language='javascript'>
//    window.open('cart.php','_self',3);</script>";
?>