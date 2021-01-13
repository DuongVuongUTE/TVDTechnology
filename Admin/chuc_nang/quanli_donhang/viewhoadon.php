<?php
session_start();
if ($_SESSION['tendnadmin'] != '') {
    if (isset($_GET['nc'])) {
        if (isset($_GET['nc']) && $_GET['nc'] == 'inhoadon') {
            require('xuathoadon.php');
        }
    }
} else {
    header("location: login_admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head lang="en">
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
                <title>QUẢN TRỊ HỆ THỐNG</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" />
                    <script src="js/jquery-3.3.1.min.js"></script>
                    <script src="js/jquery.dataTables.min.js"></script>
                    <script src="js/dataTables.bootstrap.min.js"></script>
                    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                    <!-- css và jquery -->
                    <link rel="stylesheet" href="../Admin/style/css_admin.css"/>
                    <link rel="stylesheet" href="https://www.w3schools.com/bootstrap4/bootstrap_icons.asp">
                        </head>

                        <body>
                        </body>
                        </html>