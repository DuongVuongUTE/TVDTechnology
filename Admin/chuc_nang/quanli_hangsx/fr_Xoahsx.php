<?php
require("../connect/connect.php");
$id = $_GET['id'];
$sql = "delete from tbl_hangsx where IDHang = '$id'";
if(mysqli_query($con,$sql)){
    echo "
        <script language='javascript'>
                alert('Xóa thành công');
                window.open('index.php?nc=hsx','_self',3);
        </script>";

} else
{
    echo "
        <script language='javascript'>
                alert('Không Thể Xóa!');
                window.open('index.php?nc=hsx','_self',3);
        </script>";
}
?>
