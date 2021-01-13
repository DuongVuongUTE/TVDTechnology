<?php
	require('connect/connect.php');
         $mahd = $_GET["mahd"];
        $sql_update_tt = "UPDATE tbl_hoadon SET TrangThai = 5 WHERE MaHD='$mahd'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="index.php?action=donhang"</script>';
?>
