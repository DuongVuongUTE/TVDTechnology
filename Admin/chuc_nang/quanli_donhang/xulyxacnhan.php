<?php
    require("../connect/connect.php"); 
    $mahd = $_GET['mahd'];
    $sql_check = "SELECT * FROM tbl_hoadon WHERE MaHD='$mahd'";
    $result_check = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_array($result_check);
    $hoten = $row['HoTen'];
    if($row['TrangThai'] == 0){
        $to_email = $row['Email'];
        $subject = 'ORDER CONFIRMATION';
        echo $message = 'Đơn hàng gồm : ahihi';
        $headers = 'From:tranvanthanh281199@gmail.com';
        @mail($to_email,$subject,$message,$headers);


        $sql_update_tt = "UPDATE tbl_hoadon SET TrangThai = 1 WHERE MaHD='$mahd'";
        mysqli_query($con, $sql_update_tt);
        echo '<script>window.location="index.php?nc=thongke"</script>';

    }else if($row['TrangThai'] == 1){
        $sql_update_tt2 = "UPDATE tbl_hoadon SET TrangThai = 2 WHERE MaHD='$mahd'";
        mysqli_query($con, $sql_update_tt2);
        echo '<script>window.location="index.php?nc=thongke"</script>';
    }else if($row['TrangThai'] == 2){
        $sql_update_tt3 = "UPDATE tbl_hoadon SET TrangThai = 3 WHERE MaHD='$mahd'";
        mysqli_query($con, $sql_update_tt3);
        echo '<script>window.location="index.php?nc=thongke"</script>';
    }else if($row['TrangThai'] == 3){
        $sql_update_tt4 = "UPDATE tbl_hoadon SET TrangThai = 4 WHERE MaHD='$mahd'";
        mysqli_query($con, $sql_update_tt4);
        echo '<script>window.location="index.php?nc=thongke"</script>';
    }
?>