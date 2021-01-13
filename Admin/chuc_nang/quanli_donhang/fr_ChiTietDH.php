<meta charset="utf-8" />
<?php 
	require("../connect/connect.php");
	$mahd = $_GET['mahd'];
	$sql_1 = "select * from tbl_hoadon  where MaHD = '$mahd'";
	$row_1 = mysqli_query($con,$sql_1);
	$count = mysqli_num_rows($row_1);
	if($count>0){
		$chitiet = mysqli_fetch_array($row_1);
	}
?>
<div class="row">
    <div class="col-md-6 col-12">
        <form action="index.php?nc=chitiet" method="POST" enctype="multipart/form-data">
            <h3 class="text-center" style="margin-top: 17px;">THÔNG TIN HÓA ĐƠN</h3>
            <p><b>Mã hóa đơn: </b><?php echo "$mahd"; ?></p>
            <p><b>Tên khách hàng: </b><?php echo $chitiet['HoTen']; ?></p>
            <p><b>Số điện thoại: </b><?php echo $chitiet['SDT']; ?></p>
            <p><b>Email: </b><?php echo $chitiet['Email']; ?></p>
            <p><b>Địa chỉ: </b><?php echo $chitiet['DiaChiNhan']; ?></p>
            <p><b>Ngày đặt hàng: </b><?php echo $chitiet['NgayDatHang']; ?></p>
        </form>
    </div>
    <div class="col-md-6 col-12">
        <?php require("ds_cthd.php");?>
    </div>
</div>
<div class="row justify-content-center">
    <button type="submit" class="btn btn-outline-primary w-25 mt-5 text-white" style="margin-left: 323px;"><a href="../viewhoadon.php?nc=inhoadon&mahd=<?php echo $mahd;?>">Xuất hóa đơn</a></button>
</div> 
                    
