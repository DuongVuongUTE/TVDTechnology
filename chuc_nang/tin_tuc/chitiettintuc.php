<meta charset="utf-8" />
<?php
require('connect/connect.php');
$matt = $_GET['matt'];
$sql = mysqli_query($con, "select * from tbl_tintuc where MaTT=$matt");
while ($row = mysqli_fetch_array($sql)) {
    ?>
    <div class="alert alert-danger text-center m-1">
        <h3><b>TIN TỨC<b><h3>
    </div>
    <div class="container bg-white">
        <div class="row px-5">
            <p><h3><b><?php echo $row['TieuDe']?><b><h3></P>
            <p><?php echo $row['NoiDungTT']?></P>
        </div>    
    </div>
    
<?php } ?>