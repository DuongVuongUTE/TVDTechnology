<?php
	require('./connect/connect.php');
?>
<div class="container padding">
    <div class="row">
        
        <div class="col-md-6 col-12">  
            <form method="post">
				<h2 class="text-center mb-2 mr-sm-2">THÔNG TIN GIAO HÀNG</h2>
                <?php
                if (isset($_SESSION['tendn'])) {
                    $sql = mysqli_query($con,"select * from tbl_member where User='" . $_SESSION['tendn'] . "'");
                    $row = mysqli_fetch_array($sql);
                }else{
                    echo '<script>alert("Vui lòng đăng nhập để mua hàng!")</script>'; 
                    echo '<script>window.location="index.php"</script>'; 
                }
                ?>
                <input type="hidden" class="form-control mb-2 mr-sm-2" placeholder="Nhập email" name="txt_idkh" value="<?php echo $row['ID'] ?>">
                <label class="mb-2 mr-sm-2">Nhập địa chỉ Email:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nhập email" name="txt_email" value="<?php echo $row['Email'] ?>">
                <label class="mb-2 mr-sm-2">Nhập họ tên:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nhập họ tên" name="txt_hoten" value="<?php echo $row['HoTen'] ?>">
                <label class="mb-2 mr-sm-2">Nhập số điện thoại:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nhập số điện thoại" name="txt_dienthoai" value="<?php echo $row['SDT'] ?>">
                <label class="mb-2 mr-sm-2">Nhập địa chỉ nhận hàng:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nhập địa chỉ nhận hàng" name="txt_diachinhanhang" value="<?php echo $row['DiaChi'] ?>">  
                <label class="mb-2 mr-sm-2">Chọn phương thức thanh toán:</label>
                <select name="phuongthuc" class="form-control mb-2 mr-sm-2">
                    <option value="">Phương thức thanh toán</option>
                    <option value="1">Qua bưu điện</option>
                    <option value="2">Qua thẻ ATM</option>
                    <option value="3">Thanh toán trực tiếp</option>
                </select>
                <button type="submit" class="btn btn-primary mb-2 btn-block" name="LuuTT" value="Đặt hàng">Đặt hàng</button>
				<?php
					require('insert.php');
				?>
            </form>
        </div> 
        <div class="col-md-6 col-12">
			<h2 class="text-center mb-2 mr-sm-2">THÔNG TIN ĐƠN HÀNG</h2>
            <table class="table table-sm table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                    </tr>  
                </thead>  
                <tbody class="bg-white">
                <?php
                    $total = 0;
                    $tongsp = 0;
                    if (isset($_SESSION['giohang'])) {
                        foreach ($_SESSION['giohang'] as $id => $ls) {
                            $row_show = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM tbl_dmsp WHERE id in ('$id')"));
                            ?>
                            <tr>
                                <td><?php echo $row_show[2]; ?></td>
                                <td class="text-center"><?php echo  $ls; ?></td>
                                <td><?php echo number_format($row_show[4], 0); ?></td>
                                <td><?php echo number_format($row_show[4] * $ls); ?></td>
                            </tr>
                            <?php
                                    $total = $total + ($row_show[4] * $ls);
                                    $tongsp = $tongsp + $ls;
                                    ?>

                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3" class="text-right">Tổng cộng</td>
                        <td colspan="3"><?php echo number_format($total); ?></td>
                    </tr>
                </tbody>
            </table>  
        </div> 
    </div>
</div>
