<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['tendn']) != null) {
    if ($id != "") {
        if (isset($_SESSION['giohang'][$id])) {
            $_SESSION['giohang'][$id]++;
        } else {
            $_SESSION['giohang'][$id] = 1;
        }
    } else { }
    header('Location: index.php');
} else { 
    echo "<script language='javascript'>
    alert('Đăng nhập để tiếp tục mua hàng');
    window.open('index.php','_self',3);</script>";
    
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["giohang"] as $keys => $values) {
            if ($keys == $id) {
                unset($_SESSION["giohang"][$keys]);
                header('location: index.php?action=giohang');
            }
        }
    }
}
